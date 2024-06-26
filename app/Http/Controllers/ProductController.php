<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\Models\categories;
use App\Models\colors;
use App\Models\images;
use App\Models\products;
use App\Models\sizes;
use App\Models\inventories;

class ProductController extends Controller
{
    public function product($id=0){
        $color=new colors();
        $colors=$color->getAllColors();

        $category=new categories();
        $category->id=$id;
        $category=$category->getCategoryById();
        
        if($category->id==0){
            $categoryName='Tất cả sản phẩm';
        }else{
            $categoryName=$category->name;
        }
        $size=new sizes();
        $sizes=$size->getAllSizes();
        
        $product=new products();
        $categoriesParent=$category-> getCategoriesParent();
        $products=$category->getProductsOfCategory($id);
        $images = collect(); 
        foreach ($products as $item) {
            $images = $images->merge($item->getMainImage());
        }
        $imagesAll=new images();
        $imagesAll=$imagesAll->getAllImages();
        $limitPage=9;
        $inventory=new inventories();
        $inventories=$inventory->getAllInventories();
        $size=new sizes();
        $sizes=$size->getAllSizes();
        return view('product', compact('imagesAll', 'inventory','inventories','sizes' , 'categoriesParent', 'products','color' , 'images', 'colors', 'categoryName', 'limitPage'));
    }
    public function detail($id){ 
        $product=new products();
        $product->id=$id;
        $inventories=$product->getInventoryOfProduct();
        $imagesDetail=$product->getImagesDetail();
        $imagesColors=$product->getImagesColors();
        $product=$product->getProductById();
        $size=new sizes();
        $sizes=$size->getAllSizes();
        $color=new colors();
        $idInventoryDefault=$product->getIdInventory($product->id, $imagesColors[0]->id_color, $sizes[0]->id)->id;
        return view('detail', compact('inventories','product',
         'sizes', 'color', 'imagesDetail', 'imagesColors', 'idInventoryDefault'));
    }
}
