<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\carts;
use App\Models\users;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(parse_url(url()->previous(), PHP_URL_PATH)!='/loginform'){
            session()->put('page', url()->previous());
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 1) {
                return redirect()->intended('admin');
            }

            $carts=new carts();
            $carts=$carts->getCartsOfUser(Auth::user()->id);
            
                
            $cartstemp=[];
            foreach ($carts as $item) {
                array_push($cartstemp, ['image'=>$item->image, 'price'=>$item->price, 'quantity'=>$item->quantity, 'id_inventory'=>$item->id_inventory]);
            }
            if(is_array(session('carts'))){
                $carts=session('carts');
                foreach ($carts as $item) {
                    array_push($cartstemp, ['image'=>$item['image'], 'price'=>$item['price'], 'quantity'=>$item['quantity'], 'id_inventory'=>$item['id_inventory']]);
                }
            }
            session()->put('carts', $cartstemp);
            return redirect(parse_url(session('page'), PHP_URL_PATH));
        }
        

        return redirect()->back()->withErrors(['login' => 'Email hoặc mật khẩu không đúng.'])->withInput();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = users::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect(parse_url(session('page'), PHP_URL_PATH));       
            }else{
                $newUser = users::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect(parse_url(session('page'), PHP_URL_PATH));
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
