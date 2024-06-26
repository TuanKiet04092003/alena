<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class password_reset extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'email', 'token', 'created_at'
    ];
    public function getPasswordResetById($id){
        return self::where('id', $id)->first();
    }
    public function getPasswordResetByEmail($email){
        return self::where('email', $email)->first();
    }
}
