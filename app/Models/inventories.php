<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id_product', 'id_size', 'id_color', 'quantity'
    ];
    
    public function getInventoryById($id){
        return self::find($id);
    }
    public function getInventoryOfMain($id_product, $id_color){
        return self::where('id_product', $id_product)->where('id_color', $id_color)->where('id_size', 1)->first();
    }
    public function getAllInventories(){
        return self::all();
    }
    public function getInventoriesOfColor($id_product, $id_color){
        return self::where('id_product', $id_product)->where('id_color', $id_color)->get();
    }
}
