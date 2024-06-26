<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\VoucherMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\colors;
use App\Models\products;
use App\Models\sizes;
use App\Models\inventories;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\carts;
use App\Models\vouchers;
use App\Models\used_vouchers;
use Illuminate\Support\Carbon;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class CartController extends Controller
{
    public function cart(Request $request){ 
        
        session()->forget('buynow');
        $carts=session('carts');
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        if(is_array($carts)){
            foreach (session('carts') as $item) {
                $totalPayment+=$item['price']*$item['quantity'];
                $inventory=$inventory->getInventoryById($item['id_inventory']);
    
                $product->id=$inventory->id_product;
                array_push($productName, $product->getProductById()->name);
                array_push($colors, $color->getColorById($inventory->id_color)->color);
                array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
            }
        }
        if($totalPayment>=500000){
            $powerFreeship=100;
        }else{
            $powerFreeship=round($totalPayment*100/500000);
        }
        
        // session()->flush();
        return view('cart', compact('carts', 'productName', 'colors', 'sizes', 'totalPayment', 'powerFreeship'));
    }
    public function checkoutform(){ 
        if(is_array(session('buynow'))){
            $buynow=session('buynow');
            $inventory=new inventories();
            $inventory=$inventory->getInventoryById($buynow[0]['id_inventory']);
            $product=new products();
            $color=new colors();
            $size=new sizes();
            $product->id=$inventory->id_product;
            $productName=[];
            $colors=[];
            $sizes=[];
            $totalPayment=$buynow[0]['quantity']*$buynow[0]['price'];
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
            if($totalPayment>=500000){
                $feeShipping=0;
            }else{
                $feeShipping=30000;
            }
            $carts=$buynow;
            return view('checkout', compact('carts', 'productName', 'colors', 'sizes', 'totalPayment', 'feeShipping'));
        }else{
            if(Auth::check()){
                $carts=new carts();
                $carts=$carts->getCartsOfUser(Auth::user()->id);
                if(count($carts)>0){
                    foreach ($carts as $item) {
                        carts::destroy($item->id);
                    }
                }
                
                if(is_array(session('carts'))){
                    foreach (session('carts') as $item) {
                        $cart=new carts();
                        $cart->id_user=Auth::user()->id;
                        $cart->quantity=$item['quantity'];
                        $cart->price=$item['price'];
                        $cart->image=$item['image'];
                        $cart->id_inventory=$item['id_inventory'];
                        $cart->save();
                    }
                }
            }
            $carts=session('carts');
            $productName=[];
            $colors=[];
            $sizes=[];
            $inventory=new inventories();
            $product=new products();
            $color=new colors();
            $size=new sizes();
            $totalPayment=0;
            if(is_array(session('carts'))){
                foreach (session('carts') as $item) {
                    $totalPayment+=$item['price']*$item['quantity'];
                    $inventory=$inventory->getInventoryById($item['id_inventory']);
        
                    $product->id=$inventory->id_product;
                    array_push($productName, $product->getProductById()->name);
                    array_push($colors, $color->getColorById($inventory->id_color)->color);
                    array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
                }
            }else{
                $carts=[];
            }
            if($totalPayment>=500000){
                $feeShipping=0;
            }else{
                $feeShipping=30000;
            }
            // session()->flush();
            return view('checkout', compact('carts', 'productName', 'colors', 'sizes', 'totalPayment', 'feeShipping'));
        }
    }
    public function checkout(Request $request){
        if($request->action=="voucher"){
            session()->forget('discount');
            $code=$request->voucher;
            $voucher=new vouchers();
            $voucher=$voucher->getVoucherByCode($code);
            if($voucher){
                if(Auth::check()){
                    $used_voucher=new used_vouchers();
                    if($used_voucher->getUsedVoucherOfUser(Auth::user()->id, $voucher->id)){
                        return redirect()->back()->withErrors(['voucher' => 'Bạn đã dùng mã giảm giá này rồi'])->withInput();
                    }    
                }
                
                if($voucher->id_user!=0){
                    if(Auth::check()){
                        if(Auth::user()->id!=$voucher->id_user){
                            return redirect()->back()->withErrors(['voucher' => 'Mã giảm giá không áp dụng với tài khoản của bạn'])->withInput();
                        }else{
                            if($voucher->quantity>0){
                                if($voucher->miximum_payment>$request->totalPayment){
                                    return redirect()->back()->withErrors(['voucher' => 'Mã giảm giá chỉ áp dụng với đơn hàng từ '.number_format($voucher->miximum_payment, 0, '.', ',')])->withInput();
                                }else{
                                    if($voucher->type_discount==1){
                                        $discount=$voucher->discount;
                                       
                                    }else{
                                        $discount=$request->totalPaymentTemp*$voucher->discount/100;
                                    }
                                    session()->put('discount', $discount);
                                    session()->put('id_voucher', $voucher->id);
                                    
                                }
                            }else{
                                return redirect()->back()->withErrors(['voucher' => 'Mã giao hàng đã dùng quá số lần cho phép'])->withInput();
                            }
                        }
                    }else{
                        return redirect()->back()->withErrors(['voucher' => 'Mã giảm giá không áp dụng với tài khoản của bạn'])->withInput();
                    }
                }else{
                    if($voucher->quantity>0){
                        if($voucher->miximum_payment>$request->totalPayment){
                            return redirect()->back()->withErrors(['voucher' => 'Mã giảm giá chỉ áp dụng với đơn hàng từ '.number_format($voucher->miximum_payment, 0, '.', ',')])->withInput();
                        }else{
                            if($voucher->type_discount==1){
                                $discount=$voucher->discount;
                            }else{
                                $discount=$request->totalPaymentTemp*$voucher->discount/100;
                            }
                            session()->put('discount', $discount);
                            session()->put('id_voucher', $voucher->id);
                            
                        }
                    }else{
                        return redirect()->back()->withErrors(['voucher' => 'Mã giao hàng đã dùng quá số lần cho phép'])->withInput();
                    }
                    
                }
            }else{
                return redirect()->back()->withErrors(['voucher' => 'Mã giảm giá không tồn tại.'])->withInput();
            }
            return redirect('/checkout');
        }else{
            $validator=$this->validator($request->all());
            if(Auth::check()){
                if(session('buynow')){
                    $carts=[];
                    $buynow=session('buynow');
                    foreach ($buynow as $item) {
                        $cart=new carts();
                        $cart->quantity=$item['quantity'];
                        $cart->price=$item['price'];
                        $cart->image=$item['image'];
                        $cart->id_inventory=$item['id_inventory'];
                        array_push($carts, $cart);
                    }
                }else{
                    $carts=new carts();
                    $carts=$carts->getCartsOfUser(Auth::user()->id);  
                }
                
                $validator=$this->validatorlogin($request->all());
                    if ($validator->fails()) {
                        return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
                    }
                if($request->has('addressothercheck') && $request->addressothercheck){
                    $validator=$this->validatorother($request->all());
                    if ($validator->fails()) {
                        return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
                    }
                    $order=new orders();
                    if($request->has('fast')){
                        if($request->fast){
                            $order->fast_delivery=1;
                        }else{
                            $order->fast_delivery=0;
                        }
                    }else{
                        $order->fast_delivery=0;
                    }
                    $order->id_user=Auth::user()->id;
                    $order->code_order=self::createCodeOrder(8);
                    $order->date_created=Carbon::now();
                    $order->status="Chờ thanh toán";
                  
                    
                    $order->total_payment=$request->totalPayment;
                    $order->name_order=$request->name;
                    $order->email_order=$request->email;
                    $order->phone_order=$request->phone;
                    $order->address_order=$request->address;
                    $order->name_receive=$request->nameother;
                    $order->email_receive=$request->emailother;
                    $order->phone_receive=$request->phoneother;
                    $order->address_receive=$request->addressother;
                    $order->method_payment=$request->methodcheckout;
                    $order->id_voucher=1;
                    $order->save();
                    foreach ($carts as $item) {
                        $orderdetail=new orderdetails();
                        $orderdetail->id_order=$order->id;
                        $orderdetail->quantity=$item->quantity;
                        $orderdetail->price=$item->price;
                        $orderdetail->image=$item->image;
                        $orderdetail->id_inventory=$item->id_inventory;
                        $orderdetail->save();
                        $inventory=new inventories();
                        $inventory=$inventory->getInventoryById($item->id_inventory);
                        $inventory->quantity-=$item->quantity;
                        $inventory->save();
                        carts::destroy($item->id);
                    }
                    
                    session()->forget('carts');
                }else{
                    $order=new orders();
                    if($request->has('fast')){
                        if($request->fast){
                            $order->fast_delivery=1;
                        }else{
                            $order->fast_delivery=0;
                        }
                    }else{
                        $order->fast_delivery=0;
                    }
                    $order->id_user=Auth::user()->id;
                    $order->code_order=self::createCodeOrder(8);
                    $order->date_created=Carbon::now();
                    $order->status="Chờ thanh toán";
                    $order->total_payment=$request->totalPayment;
                    $order->name_order=$request->name;
                    $order->email_order=$request->email;
                    $order->phone_order=$request->phone;
                    $order->address_order=$request->address;
                    $order->name_receive=$request->name;
                    $order->email_receive=$request->email;
                    $order->phone_receive=$request->phone;
                    $order->address_receive=$request->address;
                    $order->method_payment=$request->methodcheckout;
                    $order->id_voucher=1;
                    $order->save();
                    foreach ($carts as $item) {
                        $orderdetail=new orderdetails();
                        $orderdetail->id_order=$order->id;
                        $orderdetail->quantity=$item->quantity;
                        $orderdetail->price=$item->price;
                        $orderdetail->image=$item->image;
                        $orderdetail->id_inventory=$item->id_inventory;
                        $orderdetail->save();
                        $inventory=new inventories();
                        $inventory=$inventory->getInventoryById($item->id_inventory);
                        $inventory->quantity-=$item->quantity;
                        $inventory->save();
                        carts::destroy($item->id);
                    }
                    session()->forget('carts');
                }
                $new=0;
                $orderdetail=new orderdetails();
                $orderdetail=$orderdetail->getOrderDetailByIdOrder($order->id);
                $productName=[];
                $colors=[];
                $sizes=[];
                foreach ($orderdetail as $item) {
                    $inventory=new inventories();
                    $inventory=$inventory->getInventoryById($item->id_inventory);
                    $product=new products();
                    $product->id=$inventory->id_product;
                    array_push($productName, $product->getProductById()->name);
                    $color=new colors();
                    array_push($colors, $color->getColorById($inventory->id_color)->color);
                    $size=new sizes();
                    array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
                }
                
                if(session('discount')){
                    $voucher=new vouchers();
                    $voucher=$voucher->getVoucherById(session('id_voucher'));
                    if($voucher){
                        if($voucher->id_user!=0){
                            vouchers::destroy($voucher->id);
                        }else{
                            $voucher->quantity--;
                            $voucher->save();
                            
                            $used_voucher=new used_vouchers();
                            $used_voucher->id_user=Auth::user()->id;
                            $used_voucher->id_voucher=session('id_voucher');
                            $used_voucher->save();
                        }
                    }
                    session()->forget('discount');
                    session()->forget('id_voucher');
                    $voucher=new vouchers();
                    $voucher->code_voucher=$this->createVoucher();
                    $voucher->discount=10;
                    $voucher->miximum_payment=500000;
                    $voucher->type_discount=2;
                    $voucher->id_user=Auth::user()->id;
                    $voucher->quantity=1;
                    $voucher->save();
                }
                
                
                Mail::to(Auth::user()->email)->send(new VoucherMail($voucher->code_voucher));
                Mail::to(Auth::user()->email)->send(new OrderMail(Auth::user(), $order, $orderdetail, $new, $productName, $colors, $sizes));
            }else{
                if(session('buynow')){
                    $carts=[];
                    $buynow=session('buynow');
                    foreach ($buynow as $item) {
                        $cart=new carts();
                        $cart->quantity=$item['quantity'];
                        $cart->price=$item['price'];
                        $cart->image=$item['image'];
                        $cart->id_inventory=$item['id_inventory'];
                        array_push($carts, $cart);
                    }
                }
                $validator=$this->validator($request->all());
                    if ($validator->fails()) {
                        return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
                    }
                $user=new users();
                $user->name=$request->name;
                $user->email=$request->email;
                $user->phone=$request->phone;
                $user->address=$request->address;
                $user->username = self::createUsername(8);
                $passwordsend=self::createPassword(8);
                $user->password = Hash::make($passwordsend);
                $user->gender=0;
                $user->birthday=null;
                $user->role=0;
                $user->image="";
                $user->active=1;
                $user->save();
                Auth::login($user);
                if($request->has('addressothercheck') && $request->addressothercheck){
                    $validator=$this->validatorother($request->all());
                    if ($validator->fails()) {
                        return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
                    }
                    $order=new orders();
                    if($request->has('fast')){
                        if($request->fast){
                            $order->fast_delivery=1;
                        }else{
                            $order->fast_delivery=0;
                        }
                    }else{
                        $order->fast_delivery=0;
                    }
                    $order->id_user=Auth::user()->id;
                    $order->code_order=self::createCodeOrder(8);
                    $order->date_created=Carbon::now();
                    $order->status="Chờ thanh toán";
                    $order->total_payment=$request->totalPayment;
                    $order->name_order=$request->name;
                    $order->email_order=$request->email;
                    $order->phone_order=$request->phone;
                    $order->address_order=$request->address;
                    $order->name_receive=$request->nameother;
                    $order->email_receive=$request->emailother;
                    $order->phone_receive=$request->phoneother;
                    $order->address_receive=$request->addressother;
                    $order->method_payment=$request->methodcheckout;
                    $order->id_voucher=1;
                    $order->save();
                    foreach ($carts as $item) {
                        $orderdetail=new orderdetails();
                        $orderdetail->id_order=$order->id;
                        $orderdetail->quantity=$item['quantity'];
                        $orderdetail->price=$item['price'];
                        $orderdetail->image=$item['image'];
                        $orderdetail->id_inventory=$item['id_inventory'];
                        $orderdetail->save();
                        $inventory=new inventories();
                        $inventory=$inventory->getInventoryById($item['id_inventory']);
                        $inventory->quantity-=$item['quantity'];
                        $inventory->save();
                    }
                    session()->forget('carts');
                }else{
                    $order=new orders();
                    if($request->has('fast')){
                        if($request->fast){
                            $order->fast_delivery=1;
                        }else{
                            $order->fast_delivery=0;
                        }
                    }else{
                        $order->fast_delivery=0;
                    }
                    $order->id_user=Auth::user()->id;
                    $order->code_order=self::createCodeOrder(8);
                    $order->date_created=Carbon::now();
                    $order->status="Chờ thanh toán";
                    $total=0;
                    foreach ($carts as $item) {
                        $total+=$item['price']*$item['quantity'];
                    }
                    $order->total_payment=$total;
                    $order->name_order=$request->name;
                    $order->email_order=$request->email;
                    $order->phone_order=$request->phone;
                    $order->address_order=$request->address;
                    $order->name_receive=$request->name;
                    $order->email_receive=$request->email;
                    $order->phone_receive=$request->phone;
                    $order->address_receive=$request->address;
                    $order->method_payment=$request->methodcheckout;
                    $order->id_voucher=1;
                    $order->save();
                    foreach ($carts as $item) {
                        $orderdetail=new orderdetails();
                        $orderdetail->id_order=$order->id;
                        $orderdetail->quantity=$item['quantity'];
                        $orderdetail->price=$item['price'];
                        $orderdetail->image=$item['image'];
                        $orderdetail->id_inventory=$item['id_inventory'];
                        $orderdetail->save();
                        $inventory=new inventories();
                        $inventory=$inventory->getInventoryById($item['id_inventory']);
                        $inventory->quantity-=$item['quantity'];
                        $inventory->save();
                    }
                    session()->forget('carts');
                }
                $new=$passwordsend;
                $orderdetail=new orderdetails();
                $orderdetail=$orderdetail->getOrderDetailByIdOrder($order->id);
                $productName=[];
                $colors=[];
                $sizes=[];
                foreach ($orderdetail as $item) {
                    $inventory=new inventories();
                    $inventory=$inventory->getInventoryById($item->id_inventory);
                    $product=new products();
                    $product->id=$inventory->id_product;
                    array_push($productName, $product->getProductById()->name);
                    $color=new colors();
                    array_push($colors, $color->getColorById($inventory->id_color)->color);
                    $size=new sizes();
                    array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
                }
                
                if(session('discount')){
                    $voucher=new vouchers();
                    $voucher=$voucher->getVoucherById(session('id_voucher'));
                    if($voucher){
                        if($voucher->id_user!=0){
                            vouchers::destroy($voucher->id);
                        }else{
                            $voucher->quantity--;
                            $voucher->save();
                            
                            $used_voucher=new used_vouchers();
                            $used_voucher->id_user=Auth::user()->id;
                            $used_voucher->id_voucher=session('id_voucher');
                            $used_voucher->save();
                        }
                    }
                    session()->forget('discount');
                    session()->forget('id_voucher');
                    $voucher=new vouchers();
                    $voucher->code_voucher=$this->createVoucher();
                    $voucher->discount=10;
                    $voucher->miximum_payment=500000;
                    $voucher->type_discount=2;
                    $voucher->id_user=Auth::user()->id;
                    $voucher->quantity=1;
                    $voucher->save();
                }
                Mail::to(Auth::user()->email)->send(new VoucherMail($voucher->code_voucher));
                Mail::to(Auth::user()->email)->send(new OrderMail(Auth::user(), $order, $orderdetail, $new, $productName, $colors, $sizes));
            }
            session()->forget('discount');
            session()->forget('buynow');
            return redirect('/orderdetail/'.$order->id);
        }
    }
    protected function createVoucher($length = 8) {
        // Định nghĩa các nhóm ký tự
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
    
        // Chọn ngẫu nhiên ít nhất một ký tự từ mỗi nhóm
        $randomString = $upperCase[rand(0, strlen($upperCase) - 1)] .
                        $lowerCase[rand(0, strlen($lowerCase) - 1)] .
                        $numbers[rand(0, strlen($numbers) - 1)];
    
        // Kết hợp các nhóm ký tự
        $allCharacters = $upperCase . $lowerCase . $numbers;
    
        // Thêm các ký tự ngẫu nhiên khác để đạt độ dài mong muốn
        for ($i = strlen($randomString); $i < $length; $i++) {
            $randomString .= $allCharacters[rand(0, strlen($allCharacters) - 1)];
        }
    
        // Xáo trộn chuỗi để đảm bảo tính ngẫu nhiên
        $randomString = str_shuffle($randomString);
    
        return $randomString;
    }
    protected function createCodeOrder($length)
    {
        $digits = 'alena_';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
    protected function createUsername($length)
    {
        $digits = 'user';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
    protected function createPassword($length)
    {
        $digits = '';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
    }
    protected function validatorlogin(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
    }
    protected function validatorother(array $data)
    {
        return Validator::make($data, [
            'emailother' => ['required', 'string', 'email', 'max:255'],
            'nameother' => ['required', 'string'],
            'phoneother' => ['required', 'string'],
            'addressother' => ['required', 'string'],
        ]);
    }
    public function deletecart($ind){
        $carts=session('carts');
        array_splice($carts,$ind,1);
        session()->put('carts', $carts);        
        return redirect('/cart');    
    }
    public function addtocart(Request $request){ 
        if($request->action=='buynow'){
            if($request->has('idinventory')){
                $idInventory=$request->idinventory;
                $quantity=$request->quantity;
                $price=$request->price;
                $image=$request->image;
                $buynow=[['image'=>$image, 'price'=>$price, 'quantity'=>$quantity, 'id_inventory'=>$idInventory]];
                session()->put('buynow', $buynow);
            }
            return redirect('/checkout'); 
        }else{
             
            if($request->has('idinventory')){
                $idInventory=$request->idinventory;
                $quantity=$request->quantity;
                $price=$request->price;
                $image=$request->image;
    
    
                if(session()->has('carts')){
                    $carts=session('carts');
                    $check=0;
                    for ($i=0; $i < count($carts); $i++) { 
                        if($carts[$i]['id_inventory']==$idInventory){
                            $carts[$i]['quantity']+=$quantity;
                            $check=1;
                            break;
                        }
                    }
                    if($check==0){
                        array_push($carts, ['image'=>$image, 'price'=>$price, 'quantity'=>$quantity, 'id_inventory'=>$idInventory]);
                    }
                    session()->put('carts', $carts);
                }else{
                    $carts=[['image'=>$image, 'price'=>$price, 'quantity'=>$quantity, 'id_inventory'=>$idInventory]];
                    session()->put('carts', $carts);
                }
            }
    
    
            $carts=session('carts');
            if($request->has('soluongmoi')){
                $soluong=$request->soluongmoi;
                $ind=$request->ind;
                $carts=session('carts');
                if($soluong==0){
                    array_splice($carts,$ind,1);
                    session()->put('carts', $carts);
                }else{
                    $carts[$ind]['quantity']=$soluong;
                    session()->put('carts', $carts);
                }
            }  
            return redirect('/cart');  
        }    
    }
}
