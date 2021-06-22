<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //Show New Product By category
    public function newProductByCategory(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        return $category->products()->active()->with('meta')->take(10)->get();
    }

    //Product Quick View
    public function productQuickView(Request $request)
    {
        $product = Product::active()->with('meta')->findOrFail($request->id);
        return response()->json($product);
    }
}
