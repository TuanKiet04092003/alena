<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiCategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'stt', 'sethome', 'id_parent'];

    public function apiProductsModel(){
        return $this->hasMany('apiProductsModel::class');
    }

}
