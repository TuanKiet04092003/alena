<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\password_reset;
use App\Mail\ResetPasswordMail;
use App\Models\orderdetails;
use App\Models\orders;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use App\Models\inventories;
use App\Models\products;
use App\Models\colors;
use App\Models\sizes;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function account(){
        $orders=new orders();
        $order=[];
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $vieworder=0;
            $vieworderdetail=0;
            $productName=[];
            $colors=[];
            $sizes=[];
            $orderdetail=[];
        if(is_array($orders)){
            $orderdetail=new orderdetails();
            $orderdetail=$orderdetail->getOrderDetailByIdOrder($orders[0]->id);
            
            $inventory=new inventories();
            $product=new products();
            $color=new colors();
            $size=new sizes();
            $totalPayment=0;
            foreach ($orderdetail as $item) {
                $totalPayment+=$item['price']*$item['quantity'];
                $inventory=$inventory->getInventoryById($item['id_inventory']);
    
                $product->id=$inventory->id_product;
                array_push($productName, $product->getProductById()->name);
                array_push($colors, $color->getColorById($inventory->id_color)->color);
                array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
            }
        }
        
        return view('account', compact('order', 'orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    public function viewotherorder(){
        $orders=new orders();
        $order=[];
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($orders[0]->id);
        $vieworder=1;
        $vieworderdetail=0;
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        foreach ($orderdetail as $item) {
            $totalPayment+=$item['price']*$item['quantity'];
            $inventory=$inventory->getInventoryById($item['id_inventory']);

            $product->id=$inventory->id_product;
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
        }
        return view('account', compact('order', 'orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    public function orderdetail($id){
        $orders=new orders();
        $order=$orders->getOrderById($id);
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($id);
        $vieworder=1;
        $vieworderdetail=1;
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        foreach ($orderdetail as $item) {
            $totalPayment+=$item['price']*$item['quantity'];
            $inventory=$inventory->getInventoryById($item['id_inventory']);

            $product->id=$inventory->id_product;
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
        }
        return view('account', compact('order', 'orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    public function cancelorder($id){
        $order=new orders();
        $order=$order->getOrderById($id);
        $status=$order->status;
        $order->status="Đã hủy";
        $order->save();


        $orders=new orders();
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($id);

        if($status=="Chờ thanh toán"){
            foreach ($orderdetail as $item) {
                $inventory=new inventories();
                $inventory=$inventory->getInventoryById($item->id_inventory);
                $inventory->quantity+=$item->quantity;
                $inventory->save();
            }
        }

        $vieworder=1;
        $vieworderdetail=0;
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        foreach ($orderdetail as $item) {
            $totalPayment+=$item['price']*$item['quantity'];
            $inventory=$inventory->getInventoryById($item['id_inventory']);

            $product->id=$inventory->id_product;
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
        }
        return view('account', compact('order', 'orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    public function reorder($id){
        $order=new orders();
        $order=$order->getOrderById($id);
        $status=$order->status;
        $order->status="Chờ thanh toán";
        $order->save();


        $orders=new orders();
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($id);

        if($status=="Đã hủy"){
            foreach ($orderdetail as $item) {
                $inventory=new inventories();
                $inventory=$inventory->getInventoryById($item->id_inventory);
                $inventory->quantity-=$item->quantity;
                $inventory->save();
            }
        }

        $vieworder=1;
        $vieworderdetail=0;
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        foreach ($orderdetail as $item) {
            $totalPayment+=$item['price']*$item['quantity'];
            $inventory=$inventory->getInventoryById($item['id_inventory']);

            $product->id=$inventory->id_product;
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
        }
        return view('account', compact('order', 'orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    public function updateaccount(Request $request){
        $user=new users();
        $user->id=Auth::user()->id;
        $user=$user->getUserById();
        $user->email=$request->input('email');
        $user->username=$request->input('username');
        $user->name=$request->input('name');
        $user->phone=$request->input('phone');
        $user->address=$request->input('address');
        if ($request->hasFile('avatar')) {
            if($request->input('avatarOld')){
                if (file_exists(substr($request->input('avatarOld'), 1))) {
                    unlink(substr($request->input('avatarOld'), 1));   
                }
            }
            // Lấy tệp tin từ yêu cầu
            $avatar = $request->file('avatar');
            // Truyền tệp tin vào hàm saveImageWithTimestamp
            $imageMainPath = $this->saveImageWithTimestamp($avatar);
            // Gán đường dẫn của ảnh chính cho sản phẩm
            $avatar = $imageMainPath;
        }else{
            if($request->input('avatarOld') && $request->input('avatarOld')[0]=='0'){
                if (file_exists(substr($request->input('avatarOld'), 1))) {
                    unlink(substr($request->input('avatarOld'), 1));   
                }
            }else{
                if($request->input('avatarOld')[0]=='1'){
                    $avatar=substr($request->input('avatarOld'), 1);
                }
            }
        }
        if(isset($avatar)){
            $user->image=$avatar;
        }else{
            $user->image='';
        }
        $user->save();
        Auth::logout();
        Auth::login($user);
        $orders=new orders();
        $orders=$orders->getOrdersOfUser(Auth::user()->id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($orders[0]->id);
        $vieworder=0;
        $vieworderdetail=0;
        $productName=[];
        $colors=[];
        $sizes=[];
        $inventory=new inventories();
        $product=new products();
        $color=new colors();
        $size=new sizes();
        $totalPayment=0;
        foreach ($orderdetail as $item) {
            $totalPayment+=$item['price']*$item['quantity'];
            $inventory=$inventory->getInventoryById($item['id_inventory']);

            $product->id=$inventory->id_product;
            array_push($productName, $product->getProductById()->name);
            array_push($colors, $color->getColorById($inventory->id_color)->color);
            array_push($sizes, $size->getSizeById($inventory->id_size)->code_size);
        }
        $order=[];
        return view('account', compact('order','orders', 'orderdetail', 'vieworderdetail', 'vieworder', 'productName', 'colors', 'sizes'));
    }
    private function saveImageWithTimestamp($image)
    {
        // Tạo tên tệp tin duy nhất với dấu thời gian
        $filename = time() .random_int(0, 1000). '.' . $image->getClientOriginalExtension();
        // Lưu ảnh vào thư mục 'public/uploads'
        $image->move('uploads/', $filename);
        // Trả về đường dẫn tương đối từ thư mục public
        return 'uploads/' . $filename;
    }
    public function forgetpassform(){ 
        return view('forgetpassword');
    }
    public function forgetpass(Request $request){ 
        $email = $request->input('email');
        $user=new users();
        if(!$user->getUserByEmail($email)){
            return redirect()->back()->withErrors(['forgetpassemail' => 'Email không tồn tại.'])->withInput();
        }
        $token = self::createToken(4); // Tạo token reset mật khẩu

        // Lưu token vào database
        password_reset::create([
            'email'=>$email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        $id=password_reset::orderBy('id', 'desc')->first()->id;

        // Gửi email
        Mail::to($email)->send(new ResetPasswordMail($token));
        return redirect('verifyform/'.$id);
    }
    public function verifyform($id){
        return view('verifyform', compact('id'));
    }
    protected function createToken($length)
    {
        $digits = '';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
    public function resetpassform($id){
        return view('resetpassform', compact('id'));
    }
    public function resetpass(Request $request){
        if(strlen($request->input('password'))<6){
            return redirect()->back()->withErrors(['resetpass' => 'Mật khẩu phải có ít nhất 6 ký tự.'])->withInput();
        }
        if($request->input('password')!=$request->input('repass')){
            return redirect()->back()->withErrors(['reresetpass' => 'Mật khẩu không khớp.'])->withInput();
        }
        $user=new users();
        $user->id=$request->input('id');
        $user=$user->getUserById();
        $user->password=Hash::make($request->input('password'));
        $user->save();
        $password_reset=new password_reset();
        $id=$password_reset->getPasswordResetByEmail($user->email)->id;
        password_reset::destroy($id);
        return redirect('loginform');
    }
    public function verify(Request $request){
        $passwordReset=new password_reset();
        $passwordReset=$passwordReset->getPasswordResetById($request->input('id'));
        $createdAt = Carbon::parse($passwordReset->created_at);
        $currentTime = Carbon::now();
        $verifyCode=$request->input('verifycode');
        $user=new users();
        $user=$user->getUserByEmail($passwordReset->email);
        if($verifyCode!=$passwordReset->token){
            return redirect()->back()->withErrors(['verifycode' => 'Mã xác nhận không đúng.'])->withInput();
        }
        // Kiểm tra thời gian có trễ quá 1 phút không
        if ($currentTime->diffInSeconds($createdAt) > 60) {
            return redirect()->back()->withErrors(['created_at' => 'Mã xác nhận đã hết hạn.'])->withInput();
        }
        return redirect('resetpassform/'.$user->id);
    }
}
