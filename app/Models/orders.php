<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id_user', 'code_order', 'date_created', 'status', 'total_payment', 'name_order',
        'name_receive', 'email_order', 'email_receive', 'phone_order', 'phone_receive', 
        'address_order', 'address_receive', 'method_payment', 'fast_delivery', 'id_voucher'
    ];
    
    public function getOrdersOfUser($id_user){
        return self::where('id_user', $id_user)->orderBy('id', 'desc')->get();
    }
    public function getOrderById($id){
        return self::find($id);
    }
    public function getAllOrders(){
        return self::orderBy('id', 'desc')->get();
    }
}
