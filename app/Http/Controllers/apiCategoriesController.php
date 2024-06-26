<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\apiCategoriesModel as Categories;

class apiCategoriesController extends Controller
{
    public function create_file(){
        $categories = Categories::all();
        $jsonData = $categories->toJson();
        File::put(public_path('categories.json'), $jsonData);

    }
    public function index()
    {
        return Categories::all();
    }
    public function show($id)
    {
        return Categories::find($id);
    }

    public function store(Request $request)
    {
        $product = Categories::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Categories::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Categories::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}

