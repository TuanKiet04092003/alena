<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products;

class images extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'image', 'id_product', 'id_color', 'is_main'
    ];
    public function getImageById(){
        return self::find($this->id);
    }
    public function getAllImages(){
        return self::all();
    }
}
