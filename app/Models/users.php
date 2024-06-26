<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'phone',
        'gender',
        'birthday',
        'address',
        'role',
        'image',
        'active',
        'google_id'
    ];
    public function getAllUsers(){
        return self::orderBy('id', 'desc')->get();
    }
    public function getUserById(){
        return self::find($this->id);
    }
    public function getUserByEmail($email){
        return self::where('email', $email)->first();
    }
}
