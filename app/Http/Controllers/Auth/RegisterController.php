<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use App\Models\carts;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class RegisterController extends Controller
{
    public function index(){ 
        session()->put('page', url()->previous());
        return view('register');
    }
    public function register(Request $request)
    {
        $validator=$this->validator($request->all());
        // $user = $this->create($request->all());
        // Auth::login($user);
        $validator->after(function ($validator) use ($request) {
            if ($request->password !== $request->password_confirmation) {
                $validator->errors()->add('password_confirmation', 'Nhập lại mật khẩu không khớp.');
            }
        });
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data=$request->all();
        $user=new users();
        $user->username = self::createUsername(8);
        $user->password = Hash::make($data['password']);
            
        $user->name="";
        $user->email = $data['email'];
        $user->phone="";
        $user->gender=0;
        $user->birthday=null;
        $user->address="";
        $user->role=0;
        $user->image="";
        $user->active=1;
        $user->save();
        Auth::login($user);
        return redirect(parse_url(session('page'), PHP_URL_PATH));
        
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }
    public function logout()
    {
        $carts=new carts();
            $carts=$carts->getCartsOfUser(Auth::user()->id);
            foreach ($carts as $item) {
                carts::destroy($item->id);
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
            session()->forget('carts');
        Auth::logout();
        return redirect()->route('home');
    }
    protected function createUsername($length)
    {
        $digits = 'user';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
   
}
