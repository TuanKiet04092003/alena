<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class used_vouchers extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id_voucher', 'id_user'
    ];
    
    public function getUsedVoucherOfUser($id_user, $id_voucher){
        return self::where('id_voucher', $id_voucher)->where('id_user', $id_user)->first();
    }
    public function getAllUsedVoucher(){
        return self::orderBy('id', 'desc')->get();
    }
}
