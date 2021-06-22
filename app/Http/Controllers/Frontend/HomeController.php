<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) : View
    {
        $catTabs = Category::active()->take(4)->with('products')->get();
        $heroSliders = HomeSlider::take(3)->get();
        $products = Product::active()->with('meta')->latest()->take(10)->get();
        $featuredProducts = Product::active()->latest()->where('is_featured',true)->with('meta')->get();
        $hotDealProducts = Product::active()->latest()->where(['hot_deals'=>true, 'onsale'=>true])->with('meta')->get();
        $specialOfferProducts = Product::active()->latest()->where(['special_offers'=>true])->with('meta')->get();

        return view('frontend.home',compact('heroSliders','products','catTabs','featuredProducts','hotDealProducts','specialOfferProducts'));
    }
}
