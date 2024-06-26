<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id_user', 'quantity', 'price', 'image', 'id_inventory'
    ];
    
    public function getCartsOfUser($id_user){
        return self::where('id_user', $id_user)->get();
    }
}
