<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $category = Category::create([
            'name'=> $request->name,
            'description'=> $request->description,
        ]);
        return response()->json($category);
    }
    public function delete($id){
        $category = Category::with('products')->find($id);

        if($category->products->count()>0){
            return response()->json(['message'=> "can't delete"]);
        }
        return response()->json(['message'=> "deleted successfully"]);
    }
}
