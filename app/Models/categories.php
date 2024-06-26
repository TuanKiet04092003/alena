<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products;

class categories extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'name', 'stt', 'sethome', 'id_parent'
    ];

    
    public function getCategoriesParent()
    {
        return self::where('id_parent',0)->where('id', '>', 0) ->orderBy('stt', 'asc')->get();
    }
    public function getCategoriesChildren()
    {
        return self::where('id_parent', '>', 0)->orderBy('stt', 'asc')->get();
    }
    public function getCategoriesChildrenOf($id){
        return self::where('id_parent', $id)->orderBy('stt', 'asc')->get();
    }
    public function products(){
        return $this->hasMany(products::class, 'id_category', 'id');
    }
    public function getCategoriesHome()
    {
        return self::where('sethome', 1)->orderBy('stt', 'asc')->get();
    }
    public function getCategoryById(){
        return self::find($this->id);
    }
    public function getCategoryParentOfId($id){
        return self::find($id);
    }
    public function getAllCategories(){
        return self::where('id', '>', 0)-> orderBy('id', 'desc')->get();
    }
    public function getProductsOfCategory($id){
        $category=self::find($id);
        if($category->id == 0){
            $product = new products();
            return $product->getAllProducts();
        } else {
            if($category->id_parent == 0){
                $categoriesChildren = $this->getCategoriesChildrenOf($category->id);
                $productsCollection = collect(); // Tạo một collection rỗng
    
                foreach ($categoriesChildren as $childCategory) {
                    $productsCollection = $productsCollection->merge($childCategory->products);
                }
    
                return $productsCollection;
            } else {
                return $this->products;
            }
        }
    }
    public function getProductsNewOfCategory($id) {
        return $this->getProductsOfCategory($id)
        ->filter(function($product) {
            return $product->hide == 0;
        })
        ->sortByDesc('id');
    }
    public function getProductsSaleOfCategory($id) {
        return $this->getProductsOfCategory($id)
                ->filter(function($product) {
                    return ($product->priceold > 0)&&($product->hide== 0);
                })
                ->sortByDesc('id');
    }
    public function getProductsBestsellerOfCategory($id) {
        return $this->getProductsOfCategory($id)
        ->filter(function($product) {
            return $product->hide == 0;
        })
        ->sortByDesc('sold');
    }
    public function getProductsViewOfCategory($id) {
        return $this->getProductsOfCategory($id)
        ->filter(function($product) {
            return $product->hide == 0;
        })
        ->sortByDesc('view');
    }
}
