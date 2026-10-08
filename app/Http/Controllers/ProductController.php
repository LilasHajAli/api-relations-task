<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request ){

     $product= Product::create([
        'name'=>$request ->name,
        'price'=> $request ->price,

     ]);
     return response()->json($product);
    }

    public function index($category_id){
      $category= Category::with('products')->find($category_id);
      return response()->json($category);
    }

    public function show($id){
        $product = Product::with('category')->find($id);
        return response()->json([
            'id' =>$product ->id ,
            'name'=>$product ->name ,
            'price'=> $product ->price,
            'category_name'=> $product ->category->name ,
        ]);

    }
}
