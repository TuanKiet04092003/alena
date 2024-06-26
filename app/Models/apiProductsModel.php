<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiProductsModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'code_product', 'name', 'price', 'priceold', 'description', 'id_category', 'view', 'sold', 'hide'

        
    ];
    public function apiCategoriesModel(){
        return $this->belongsTo(apiCategoriesModel::class);
    }
}
