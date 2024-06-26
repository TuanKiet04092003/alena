<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;
use App\Models\apiProductsModel as Product;
use App\Models\colors;
use App\Models\products;
use App\Models\categories;
use App\Models\images;
use App\Models\sizes;

class apiProductsController extends Controller
{
    public function dataproduct()
    {
        $colors=colors::all();
        $category=new categories();
        $categoriesParent=$category->getCategoriesParent();
        $categoriesChildren=$category->getCategoriesChildren();
        $products=$category->getProductsOfCategory(1);
        $images = collect(); 
        foreach ($products as $item) {
            $images = $images->merge($item->getMainImage());
        }
        $data = [
            'colors' => $colors,
            'categoriesParent' => $categoriesParent,
            'categoriesChildren' => $categoriesChildren,
            'products' => $products,
            'images' => $images,
        ];
        
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }
    public function datadetail(){
        $product=new products();
        $product->id=1;
        $inventories=$product->getInventoryOfProduct();
        $imagesDetail=$product->getImagesDetail();
        $imagesColors=$product->getImagesColors();
        $product=$product->getProductById();
        $size=new sizes();
        $sizes=$size->getAllSizes();
        $color=new colors();
        $colors=$color->getAllColors();
        $data = [
            'product' => $product,
            'inventories' => $inventories,
            'sizes' => $sizes,
            'colors' => $colors,
            'imagesColors' => $imagesColors,
            'imagesDetail' => $imagesDetail
        ];
    
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);


    }
    public function data_home_page(){
        $category=new categories();
        $categoriesHome=$category->getCategoriesHome();
        $categoriesChildren=$category->getCategoriesChildren();
        $images=images::where('is_main', 1)->get();
        $product=new products();
        $productNew=products::orderBy('id', 'desc')->where('hide',0)->limit(20)->get();
        $productSale=products::where('priceold', '>', 0)->where('hide',0)->limit(20)->get();
        $productFlatPrice=products::where('price', 200000)->where('hide',0)->limit(20)->get();
        $data = [
            'categoriesChildren' => $categoriesChildren,
            'productNew' => $productNew,
            'productSale' => $productSale,
            'productFlatPrice' => $productFlatPrice,
            'categoriesHome' => $categoriesHome,
            'images' => $images
        ];
    
        // Mã hóa dữ liệu thành JSON
        // $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
    
        // // Ghi nội dung JSON vào file
        // // File::put(public_path('home.json'), $jsonContent);
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function products_page(){
        $catagories=Categories::orderBy('id', 'desc')->get();
        $colors=colors::All();
        $products = Product::all();
    }
    public function testapi(){
        $product=new products();
        $data=$product->getAllProducts();        
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }
    public function index()
    {
        return view('frontend/detail');
    }
    public function home(){
        return view('frontend/home');
    }
    public function product(){
        return view('frontend/product');
    }
    public function show($id)
    {
        return Products::find($id);
    }

    public function store(Request $request)
    {
        $product = Products::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
