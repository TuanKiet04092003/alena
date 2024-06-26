<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id_order', 'quantity', 'price', 'image', 'id_inventory'
    ];
    
    public function getOrderDetailByIdOrder($id_order){
        return self::where('id_order', $id_order)->get();
    }

}
