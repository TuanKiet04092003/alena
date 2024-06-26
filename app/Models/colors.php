<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'color', 'code_color'
    ];
    public function getAllColors(){
        return self::where('id', '>', 0)->get();
    }
    public function getColorById($id){
        return self::find($id);
    }
}
