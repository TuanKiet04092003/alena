<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\catalogs;
use App\Models\categories;
use App\Models\colors;
use App\Models\images;
use App\Models\products;
use App\Models\users;
use App\Models\inventories;
use App\Models\orderdetails;
use App\Models\orders;
use App\Models\sizes;
use App\Models\vouchers;
use App\Models\used_vouchers;

class AdminController extends Controller
{
    public function dashboard(){ 
        $orders=new orders();
        $orders=$orders->getAllOrders();
        if($orders){
            $totalOrders=count($orders);
            $totalIncome=0;
            foreach ($orders as $item) {
                $totalIncome+=$item->total_payment;
            }  
        }else{
            $totalIncome=0;
            $totalOrders=0;
        }
        
        $product=new products();
        $products=$product->getAllProductsAdmin();
        $totalSold=0;
        foreach ($products as $item) {
            $totalSold+=$item->sold;
        }
        $users=users::where('role', 0)->get();
        if($users){
            $totalUsers=count($users);
        }else{
            $totalUsers=0;
        }
        
    
        return view('admin/dashboard',compact('totalOrders', 'totalUsers','totalIncome','totalSold'));
    }
    public function product(){ 
       $product=new products();
        $products=$product->getAllProductsAdmin();
        $limitPage=6;
        $images = collect(); 
        foreach ($products as $item) {
            $images = $images->merge($item->getMainImage());
        }
        return view('admin/product', compact('products','limitPage', 'images'));
    }
    public function addformproduct(){ 
        $color=new colors();
        $category=new categories();
        $categories=$category->getCategoriesChildren();
        $colors=$color->getAllColors();
        $idColorSelected=$colors[0]->id;
        $idCategorySelected=$categories[0]->id;
        return view('admin/addformproduct', compact('colors', 'categories', 'idColorSelected', 'idCategorySelected'));
    }
    public function addproduct(Request $request){
        
        $product = new products();

        $product->code_product = $request->input('code');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->priceold = $request->input('priceold');
        if($product->priceold){
        }else{
            $product->priceold=0;
        }
        $product->id_category = $request->input('id_category');
        $product->view=0;
        $product->sold=0;
        $product->hide=0;
        $id_color = $request->input('color_id');

        // Thiết lập mô tả từ đầu vào ẩn
        $product->description = $request->input('description');

        // Lưu sản phẩm vào cơ sở dữ liệu
        $product->save();

        $details= $request->file('filesDetail');
        foreach ($details as $imageDetail) {
            $image=new images();
            $imageDetailPath = $this->saveImageWithTimestamp($imageDetail);
            $image->image=$imageDetailPath;
            $image->id_product=$product->id;
            $image->id_color=0;
            $image->is_main=0;
            $image->save();
        }

        if ($request->hasFile('imageMain')) {
            $imageMain = $request->file('imageMain');
            $imageMainPath = $this->saveImageWithTimestamp($imageMain);
            $imageMain = $imageMainPath;
        }
        $image=new images();
        $image->image=$imageMain ? $imageMain : '';
        $image->id_product=$product->id;
        $image->id_color=$id_color;
        $image->is_main=1;
        $image->save();
        
        $id_colors_add=$request->input('id_colors_add');
        $id_colors_add=explode(',', $id_colors_add);
        for ($i=0; $i < count($id_colors_add); $i++) { 
            if ($request->hasFile('imageColor'.$id_colors_add[$i])) {
                $image=new images();
                $imageColor = $request->file('imageColor'.$id_colors_add[$i]);
                $imageColorPath = $this->saveImageWithTimestamp($imageColor);
                $image->image=$imageColorPath ? $imageColorPath : '';
                $image->id_product=$product->id;
                $image->id_color=$id_colors_add[$i];
                $image->is_main=0;
                $image->save();
            }
        }
        $imagesColor=$product->getImagesColors();
        $sizes=new sizes();
        $sizes=$sizes->getAllSizes();
        foreach ($imagesColor as $item) {
            foreach ($sizes as $item2) {
                $inventory=new inventories();
                $inventory->id_product=$product->id;
                $inventory->id_color=$item->id_color;
                $inventory->id_size=$item2->id;
                $inventory->quantity=0;
                $inventory->save();
            }
        }
        
        
        // // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/product')->with('success', 'Sản phẩm đã được thêm thành công!');
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
    public function editformproduct($id){ 
        $color=new colors();
        $category=new categories();
        $categories=$category->getCategoriesChildren();
        $colors=$color->getAllColors();
        $product=new products();
        $product->id=$id;
        $product=$product->getProductById();
        $imagesDetail=$product->getImagesDetail();
        $imagesColor=$product->getImagesColorNotMain();
        
        return view('admin/editformproduct', compact('color', 'colors', 'categories',
         'product', 'imagesDetail', 'imagesColor'));
    }
    public function editproduct(Request $request){
        $product = new products();
        $product->id=$request->input('id');
        $product=$product->getProductById();
        // Gán các giá trị từ biểu mẫu vào instance sản phẩm
        $product->code_product = $request->input('code');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->priceold = $request->input('priceold');
        if($product->priceold){
        }else{
            $product->priceold=0;
        }
        $product->id_category = $request->input('id_category');
        $product->view=$request->input('view');
        $product->sold=$request->input('sold');
        $product->hide=$request->input('hide');
        $id_color = $request->input('color_id');

        // Thiết lập mô tả từ đầu vào ẩn
        $product->description = $request->input('description');

        // Lưu sản phẩm vào cơ sở dữ liệu
        $product->save();

        $image= $product->getMainImage()[0];
        if($id_color!=$image->id_color){
            $inventories=new inventories();
            $inventories=$inventories->getInventoriesOfColor($product->id, $image->id_color);
            foreach ($inventories as $item) {
                inventories::destroy($item->id);
            }
            $sizes=new sizes();
            $sizes=$sizes->getAllSizes();
            foreach ($sizes as $item) {
                $inventory=new inventories();
                $inventory->id_product=$product->id;
                $inventory->id_color=$id_color;
                $inventory->id_size=$item->id;
                $inventory->quantity=0;
                $inventory->save();
            }
        }
        $image->id_color=$id_color;
        $image->save();
        if ($request->hasFile('imageMain')) {
            
            if (file_exists($image->image)) {
                unlink($image->image);   
            }
            // Lấy tệp tin từ yêu cầu
            $imageMain = $request->file('imageMain');
            // Truyền tệp tin vào hàm saveImageWithTimestamp
            $imageMainPath = $this->saveImageWithTimestamp($imageMain);
            // Gán đường dẫn của ảnh chính cho sản phẩm
            $imageMain = $imageMainPath;
            $image->image=$imageMain ? $imageMain : '';
            $image->id_product=$product->id;
            $image->id_color=$id_color;
            $image->is_main=1;
            $image->save();
        }
        
        // Lưu các ảnh chi tiết của sản phẩm
        $imagesDetailOld=$request->input('imagesDetailOld');
        $imagesDetailOld=explode(',', $imagesDetailOld);
        $images=$product->getImagesDetail();
        foreach ($images as $item) {
            if(!in_array($item->image, $imagesDetailOld)){
                if (file_exists($item->image)) {
                    unlink($item->image);   
                }
                $item->destroy($item->id);
            }
        }
        if($request->hasFile('filesDetail')){
            $details= $request->file('filesDetail');
            foreach ($details as $imageDetail) {
                $image=new images();
                $imageDetailPath = $this->saveImageWithTimestamp($imageDetail);
                $image->image=$imageDetailPath;
                $image->id_product=$product->id;
                $image->id_color=0;
                $image->is_main=0;
                $image->save();
            }
        }
        
        $id_colors_add=$request->input('id_colors_add');
        $id_colors_add=explode(',', $id_colors_add);
        $idColorOld=[];
        $imagesColor=$product->getImagesColorNotMain();
        foreach ($imagesColor as $item) {
            array_push($idColorOld, $item->id_color);
            if(!in_array($item->id_color, $id_colors_add)){
                if (file_exists($item->image)) {
                    unlink($item->image);   
                }
                $inventories=new inventories();
                $inventories=$inventories->getInventoriesOfColor($product->id, $item->id_color);
                foreach ($inventories as $item2) {
                    inventories::destroy($item2->id);
                }
                images::destroy($item->id);
            }else{
                if ($request->hasFile('imageColor'.$item->id_color)) {
                    if (file_exists($item->image)) {
                        unlink($item->image);   
                    }
                    $image=new images();
                    $image->id=$item->id;
                    $image=$image->getImageById();
                    $imageColor = $request->file('imageColor'.$item->id_color);
                    $imageColorPath = $this->saveImageWithTimestamp($imageColor);
                    $image->image=$imageColorPath ? $imageColorPath : '';
                    $image->save();
                }
            }
        }
        $id_colors_add_new=array_diff($id_colors_add, $idColorOld);
        for ($i=count($idColorOld); $i < count($id_colors_add); $i++) { 
            if ($request->hasFile('imageColor'.$id_colors_add_new[$i])) {
                $image=new images();
                $imageColor = $request->file('imageColor'.$id_colors_add_new[$i]);
                $imageColorPath = $this->saveImageWithTimestamp($imageColor);
                $image->image=$imageColorPath ? $imageColorPath : '';
                $image->id_product=$product->id;
                $image->id_color=$id_colors_add_new[$i];
                $image->is_main=0;
                $image->save();

                $sizes=new sizes();
                $sizes=$sizes->getAllSizes();
                foreach ($sizes as $item) {
                    $inventory=new inventories();
                    $inventory->id_product=$product->id;
                    $inventory->id_color=$id_colors_add_new[$i];
                    $inventory->id_size=$item->id;
                    $inventory->quantity=0;
                    $inventory->save();
                }
            }
        }
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/product')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function deleteproduct($id){
        $product=new products();
        $product->id=$id;
        $inventories=$product->getInventoryOfProduct();
        foreach ($inventories as $item) {
            inventories::destroy($item->id);
        }
        $product = new products();
        $product->id=$id;
        $product=$product->getProductById();
        $mainImage= $product->getMainImage()[0];
        if (file_exists($mainImage->image)) {
            unlink($mainImage->image);   
        }
        images::destroy($mainImage->id);
        $images=$product->getImagesDetail();
        foreach ($images as $item) {
            if (file_exists($item->image)) {
                unlink($item->image);   
            }
            images::destroy($item->id);
        }
        $images=$product->getImagesColorNotMain();
        foreach ($images as $item) {
            if (file_exists($item->image)) {
                unlink($item->image);   
            }
            images::destroy($item->id);
        }
        $inventories=$product->getInventoryOfProduct();
        foreach ($inventories as $item) {
            inventories::destroy($item->id);
        }
        products::destroy($product->id);
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/product')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function hideproduct($id){
        $product = new products();
        $product->id=$id;
        $product=$product->getProductById();
        if($product->hide==0){
            $product->hide=1;
        }else{
            $product->hide=0;
        }
        $product->save();
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/product')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function catalog(){ 
       $category=new categories();
       $categories=$category->getAllCategories();
        return view('admin/catalog', compact('categories'));
    }
    public function addformcategory(){ 
        $category=new categories();
        $categories=$category->getCategoriesParent();
        return view('admin/addformcategory', compact('categories'));
    }
    public function editformcategory($id){ 
        $category=new categories();
        $category->id=$id;
        $category=$category->getCategoryById();
        $categories=$category->getCategoriesParent();
        return view('admin/editformcategory', compact('category', 'categories'));
    }
    public function addcategory(Request $request){
        $category=new categories();
        $category->name=$request->name;
        $category->stt=$request->stt;
        $category->sethome=$request->sethome;
        $category->id_parent=$request->id_parent;
        $category->save();
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/catalog')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function editcategory(Request $request){
        $category=new categories();
        $category->id=$request->id;
        $category=$category->getCategoryById();
        $category->name=$request->name;
        $category->stt=$request->stt;
        $category->sethome=$request->sethome;
        $category->id_parent=$request->id_parent;
        $category->save();
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/catalog')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function deletecategory($id){
        categories::destroy($id);
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/catalog')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function order(){ 
        $orders=new orders();
        $orders=$orders->getAllOrders();
        return view('admin/order', compact('orders'));
    }
    public function changestatus($id){
        $order=new orders();
        $order=$order->getOrderById($id);
        $status=$order->status;
        if($status=="Chờ thanh toán"){
            $order->status="Đã thanh toán";
        }
        if($status=="Đã thanh toán"){
            $order->status="Đang giao hàng";
        }
        if($status=="Đang giao hàng"){
            $order->status="Đã giao hàng";
        }
        if($status=="Đã giao hàng"){
            $order->status="Hoàn thành";
        }
        if($status=="Hoàn thành"){
            $order->status="Chờ thanh toán";
        }
        $order->save();
        return redirect('admin/order');
    }
    public function vieworder($id){
        $order=new orders();
        $order=$order->getOrderById($id);
        $orderdetail=new orderdetails();
        $orderdetail=$orderdetail->getOrderDetailByIdOrder($order->id);
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
        return view('admin/orderdetail', compact('order', 'orderdetail', 'productName', 'colors', 'sizes'));
    }
    public function user(){ 
        $user=new users();
        $users=$user->getAllUsers();
        return view('admin/user', compact('users'));
    }
    public function addformuser(){ 
        return view('admin/addformuser');
    }
    public function adduser(Request $request){
        $user = new users();

        // Gán các giá trị từ biểu mẫu vào instance sản phẩm
        $user->username = $request->input('user');
        $user->password =Hash::make($request->input('pass'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->role = $request->input('role');
        $user->active = $request->input('active');
        $avatar='';
        if ($request->hasFile('image')) {
            // Lấy tệp tin từ yêu cầu
            $avatar = $request->file('image');
            // Truyền tệp tin vào hàm saveImageWithTimestamp
            $imageMainPath = $this->saveImageWithTimestamp($avatar);
            // Gán đường dẫn của ảnh chính cho sản phẩm
            $avatar = $imageMainPath;
        }
        $user->image=$avatar ? $avatar : '';
       
        

       
        $user->save();
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/user')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function editformuser($id){ 
        $user=new users();
        $user->id=$id;
        $user=$user->getUserById();
        return view('admin/editformuser', compact('user'));
    }
    public function edituser(Request $request){
        $user = new users();
        $user->id=$request->input('id');
        $user=$user->getUserById();

        // Gán các giá trị từ biểu mẫu vào instance sản phẩm
        $user->username = $request->input('user');
        if($request->input('pass')){
            $user->password =Hash::make($request->input('pass'));
        }else{
            
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->role = $request->input('role');
        $user->active = $request->input('active');
        $avatar='';
        if ($request->hasFile('image')) {
            if($request->input('avatarOld')){
                if (file_exists(substr($request->input('avatarOld'), 1))) {
                    unlink(substr($request->input('avatarOld'), 1));   
                }
            }
            // Lấy tệp tin từ yêu cầu
            $avatar = $request->file('image');
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
        $user->image=$avatar ? $avatar : '';
       
        

       
        $user->save();
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/user')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function deleteuser($id){
        $user = new users();
        $user->id=$id;
        $user=$user->getUserById();
        $avatar= $user->image;
        if (file_exists($avatar)) {
            unlink($avatar);   
        }
        users::destroy($user->id);
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/user')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function voucher(){ 
        $vouchers=new vouchers();
        $vouchers=$vouchers->getAllVoucher();
        return view('admin/voucher', compact('vouchers'));
    }
    public function usedvoucher(){ 
        $usedvouchers=new used_vouchers();
        $usedvouchers=$usedvouchers->getAllUsedVoucher();
        return view('admin/usedvoucher', compact('usedvouchers'));
    }
    public function addformvoucher(){ 
        return view('admin/addformvoucher');
    }
    public function editformvoucher($id){ 
        $voucher=new vouchers();
        $voucher=$voucher->getVoucherById($id);
        return view('admin/editformvoucher', compact('voucher'));
    }
    public function addvoucher(Request $request){
        $voucher = new vouchers();

        // Gán các giá trị từ biểu mẫu vào instance sản phẩm
        $voucher->code_voucher = $request->code_voucher;
        $voucher->type_discount = $request->type_discount;
        if($request->discount){
            $voucher->discount = $request->discount;
        }else{
            $voucher->discount = 0;
        }
        if($request->miximum_payment){
            $voucher->miximum_payment = $request->miximum_payment;
        }else{
            $voucher->miximum_payment = 0;
        }
        if($request->id_user){
            $voucher->id_user = $request->id_user;
        }else{
            $voucher->id_user = 0;
        }
        if($request->quantity){
            $voucher->quantity = $request->quantity;
        }else{
            $voucher->quantity = 0;
        }
        $voucher->save();
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/voucher')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function editvoucher(Request $request){
        $voucher = new vouchers();
        $voucher=$voucher->getVoucherById($request->id);
        // Gán các giá trị từ biểu mẫu vào instance sản phẩm
        $voucher->code_voucher = $request->code_voucher;
        $voucher->type_discount = $request->type_discount;
        if($request->discount){
            $voucher->discount = $request->discount;
        }else{
            $voucher->discount = 0;
        }
        if($request->miximum_payment){
            $voucher->miximum_payment = $request->miximum_payment;
        }else{
            $voucher->miximum_payment = 0;
        }
        if($request->id_user){
            $voucher->id_user = $request->id_user;
        }else{
            $voucher->id_user = 0;
        }
        if($request->quantity){
            $voucher->quantity = $request->quantity;
        }else{
            $voucher->quantity = 0;
        }

        $voucher->save();
        
        
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/voucher')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function deletevoucher($id){
        vouchers::destroy($id);
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/voucher')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function inventory(){ 
        $products=new products();
        $products=$products->getAllProducts();
        $inventories=[];
        foreach ($products as $item) {
            $inventory=$item->getInventoryOfProduct();
            $sum=0;
            foreach ($inventory as $item2) {
                $sum+=$item2->quantity;
            }
            array_push($inventories, $sum);
        }
        return view('admin/inventory', compact('products','inventories'));
    }
    public function editforminventory($id){ 
        $product=new products();
        $product->id=$id;
        $product=$product->getProductById();
        $imageColors=$product->getImagesColors();
        $sizes=new sizes();
        $sizes=$sizes->getAllSizes();
        $color=new colors();
        return view('admin/editforminventory', compact('product', 'imageColors', 'sizes', 'color'));
    }
    
    public function editinventory(Request $request){
        $id_product=$request->id_product;
        $product=new products();
        $product->id=$id_product;
        $imageColors=$product->getImagesColors();
        $sizes=new sizes();
        $sizes=$sizes->getAllSizes();
        foreach ($imageColors as $item) {
            foreach ($sizes as $item2) {
                $inventory=new inventories();
                $inventory=$product->getIdInventory($id_product, $item->id_color, $item2->id);
                $inventory->quantity=$request->input('inventory'.$item->id_color.$item2->id);
                $inventory->save();
            }
        }
        // Chuyển hướng đến trang danh sách sản phẩm với thông báo thành công
        return redirect('/admin/inventory')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
}
