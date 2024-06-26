<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SystemstoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/product/{id?}',[ProductController::class,'product']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::get('/news',[NewsController::class,'news']);
Route::get('/newsdetail',[NewsController::class,'detail']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('/systemstore',[SystemstoreController::class,'index']);
Route::get('/cart',[CartController::class,'cart']);
Route::get('/deletecart/{ind}',[CartController::class,'deletecart']);
Route::post('/addtocart',[CartController::class,'addtocart']);
Route::get('/checkout',[CartController::class,'checkoutform']);
Route::post('/checkout',[CartController::class,'checkout']);

Route::get('/loginform',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/registerform',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'register']);
Route::get('/forgetpassform',[UserController::class,'forgetpassform']);
Route::post('/forgetpass',[UserController::class,'forgetpass']);
Route::get('/logout',[RegisterController::class,'logout']);
Route::get('/verifyform/{id}',[UserController::class,'verifyform']);
Route::post('/verify',[UserController::class,'verify']);
Route::get('/resetpassform/{id}',[UserController::class,'resetpassform']);
Route::post('/resetpass',[UserController::class,'resetpass']);

Route::get('/account',[UserController::class,'account']);
Route::get('/viewotherorder',[UserController::class,'viewotherorder']);
Route::get('/orderdetail/{id}',[UserController::class,'orderdetail']);
Route::get('/cancelorder/{id}',[UserController::class,'cancelorder']);
Route::get('/reorder/{id}',[UserController::class,'reorder']);
Route::post('/updateaccount',[UserController::class,'updateaccount']);

Route::group(['middleware' => ['admin']], function () {
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class,'dashboard']);
        Route::get('/product', [AdminController::class,'product']);
        Route::get('/addformproduct', [AdminController::class,'addformproduct']);
        Route::post('/addproduct', [AdminController::class,'addproduct']);
        Route::get('/editformproduct/{id}', [AdminController::class,'editformproduct']);
        Route::post('/editproduct', [AdminController::class,'editproduct']);
        Route::get('/deleteproduct/{id}', [AdminController::class,'deleteproduct']);
        Route::get('/hideproduct/{id}', [AdminController::class,'hideproduct']);
        Route::get('/catalog', [AdminController::class,'catalog']);
        Route::get('/addformcategory', [AdminController::class,'addformcategory']);
        Route::get('/editformcategory/{id}', [AdminController::class,'editformcategory']);
        Route::post('/addcategory', [AdminController::class,'addcategory']);
        Route::post('/editcategory', [AdminController::class,'editcategory']);
        Route::get('/deletecategory/{id}', [AdminController::class,'deletecategory']);
        Route::get('/user', [AdminController::class,'user']);
        Route::get('/addformuser', [AdminController::class,'addformuser']);
        Route::post('/adduser', [AdminController::class,'adduser']);
        Route::get('/editformuser/{id}', [AdminController::class,'editformuser']);
        Route::get('/deleteuser/{id}', [AdminController::class,'deleteuser']);
        Route::post('/edituser', [AdminController::class,'edituser']);
        Route::get('/addformcategory', [AdminController::class,'addformcategory']);
        Route::post('/addcategory', [AdminController::class,'addcategory']);
        Route::get('/editformcategory/{id}', [AdminController::class,'editformcategory']);
        Route::get('/deletecategory/{id}', [AdminController::class,'deletecategory']);
        Route::post('/editcategory', [AdminController::class,'editcategory']);
        Route::get('/order', [AdminController::class,'order']);
        Route::get('/changestatus/{id}', [AdminController::class,'changestatus']);
        Route::get('/vieworder/{id}', [AdminController::class,'vieworder']);
        Route::get('/voucher', [AdminController::class,'voucher']);
        Route::get('/addformvoucher', [AdminController::class,'addformvoucher']);
        Route::get('/editformvoucher/{id}', [AdminController::class,'editformvoucher']);
        Route::post('/addvoucher', [AdminController::class,'addvoucher']);
        Route::post('/editvoucher', [AdminController::class,'editvoucher']);
        Route::get('/deletevoucher/{id}', [AdminController::class,'deletevoucher']);
        Route::get('/inventory', [AdminController::class,'inventory']);
        Route::get('/addforminventory', [AdminController::class,'addforminventory']);
        Route::get('/editforminventory/{id}', [AdminController::class,'editforminventory']);
        Route::post('/addinventory', [AdminController::class,'addinventory']);
        Route::post('/editinventory', [AdminController::class,'editinventory']);
        Route::get('/deleteinventory/{id}', [AdminController::class,'deleteinventory']);
        Route::get('/usedvoucher', [AdminController::class,'usedvoucher']);
    });
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);