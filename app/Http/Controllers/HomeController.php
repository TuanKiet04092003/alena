<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categories;
use App\Models\colors;
use App\Models\images;
use App\Models\products;
use App\Models\sizes;
use App\Models\inventories;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){ 
        $category=new categories();
        $categoriesHome=$category->getCategoriesHome();
        $color=new colors();
        $colors=$color->getAllColors();
        $imagesAll=new images();
        $imagesAll=$imagesAll->getAllImages();
        $inventory=new inventories();
        $inventories=$inventory->getAllInventories();
        $size=new sizes();
        $sizes=$size->getAllSizes();
        return view('home', compact('category', 'categoriesHome', 'colors', 'color', 'sizes', 'imagesAll', 'inventories', 'inventory'));
    }
}
