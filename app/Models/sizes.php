<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizes extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'code_size', 'height', 'weight'
    ];
    public function getAllSizes(){
        return self::all();
    }
    public function getSizeById($id){
        return self::find($id);
    }
}
