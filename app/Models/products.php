<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\categories;
use App\Models\images;
use App\Models\inventories;

class products extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'code_product', 'name', 'price', 'priceold', 'description', 'id_category', 'view', 'sold', 'hide'
    ];
    public function category(){
        return $this->belongTo(categories::class, 'id_category', 'id');
    }
    public function getCategory(){
        return categories::where('id', $this->id_category)->get();
    }
    public function getMainImage(){
        return images::where('id_product', $this->id)->where('is_main', 1)->get();
    }
    public function getAllProducts(){
        return self::where('hide',0)->orderBy('id', 'desc')->get();
    }
    public function getAllProductsAdmin(){
        return self::orderBy('id', 'desc')->get();
    }
    public function getAllPro(){
        return self::orderBy('id', 'desc')->get();
    }
    public function getProductById(){
        return self::find($this->id);
    }
    public function getInventoryOfProduct(){
        return inventories::where('id_product', $this->id)->get();
    }
    public function getImagesColors(){
        return images::where('id_product', $this->id)->where('id_color', '>', 0)-> get();
    }
    public function getImagesColorNotMain(){
        return images::where('id_product', $this->id)->where('id_color', '>', 0)->where('is_main',0)-> get();
    }
    public function getImagesDetail(){
        return images::where('id_product', $this->id)->where('id_color', 0)-> get();
    }
    public function getIdInventory($id, $id_color, $id_size){
        return inventories::where('id_product', $id)->where('id_color', $id_color)->where('id_size', $id_size)->first();
    }
}
