<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Show Single Product Details
    public function productDetails($slug)
    {
        $product = Product::active()->where('slug',$slug)->with(['meta','gallery_image'])->get()->first();
        return view('frontend.product.product-details',compact('product'));
    }
}
