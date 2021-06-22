<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //Wishlist View Page(Index)
    public function index()
    {
        $wishlists = Wishlist::where('user_id',Auth::guard('web')->id())->with('products')->get();
        return view('frontend.user.wishlist',compact('wishlists'));
    }

    //Ajax Add To Wishlist
    public function ajaxAddToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => ['required','integer'],
        ]);

        if (!Auth::guard('web')->check()){
            return response()->json([
                'type' => 'warning',
                'msg' => 'Sorry, You are not logged in!!',
            ]);
        }

        $checkProduct = Wishlist::where([
                'user_id'=>Auth::guard('web')->id(),
                'product_id'=>$request->product_id
            ])->first();

        if ($checkProduct){
            return response()->json([
                'type' => 'info',
                'msg' => 'Sorry, Product already added in wishlist!',
            ]);
        }

        Wishlist::insert([
            'user_id' => Auth::guard('web')->id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json([
            'type' => 'success',
            'msg' => 'Wishlist Added!!',
        ]);
    }

    //Remove Wishlist item
    public function removeWishlistItem(Request $request)
    {
        $request->validate([
            'wishlist_id' => ['required','integer'],
        ]);

        $delete = Wishlist::where(['user_id'=>Auth::guard('web')->id(),'product_id'=>$request->wishlist_id])->first();

        if(!$delete){
            return response()->json([
                'type' => 'error',
                'msg' => 'Wishlist Item can not Removed!!',
            ]);
        }

        $delete->delete();
        return response()->json([
            'type' => 'success',
            'msg' => 'Wishlist Item Removed!!',
        ]);
    }

    public function ajaxWishlistShow(Request $request)
    {
        $wishlists = Wishlist::where('user_id',Auth::guard('web')->id())->get();
        $productsIds = [];
        foreach( $wishlists as $wl){
            $productsIds[] = $wl->product_id;
        }
        $products = Product::whereIn('id',$productsIds)->with('meta')->get();
        return response()->json($products);
    }
}
