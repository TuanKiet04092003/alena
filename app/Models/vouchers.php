<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vouchers extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'code_voucher', 'discount', 'miximum_payment',
        'type_discount', 'id_user', 'quantity'
    ];
    
    public function getAllVoucher(){
        return self::orderBy('id', 'desc')->get();
    }
    public function getVoucherById($id){
        return self::find($id);
    }
    public function getVoucherByCode($code){
        return self::where('code_voucher', $code)->first();
    }
}
