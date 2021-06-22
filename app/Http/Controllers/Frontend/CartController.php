<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function index()
    {

        $cartDetails = [
            'count'      => Cart::count(),
            'subtotal'   => Cart::subtotal(),
            'priceTotal' => Cart::priceTotal(),
            'total'      => Cart::total(),
            'taxAmount'  => Cart::tax(),
            'taxPercent' => config('cart.tax'),
        ];
        $cartContents = Cart::content();
        return view('frontend.user.cart', compact('cartContents', 'cartDetails'));
    }

    //Add To cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => ['integer', 'required'],
            'quantity'   => ['integer', 'required'],
        ]);

        self::addToCartAlgo($request);

        return back()->with('cart_msg', 'Cart Added!!');
    }

    //Ajax
    public function ajaxCartItemRemove(Request $request)
    {
        $request->validate([
            'rowId' => 'required',
        ]);
        $response = [];
        try {
            Cart::remove($request->rowId);
            $response = [
                'type' => 'success',
                'msg'  => 'Cart Successfully Removed!!'
            ];
        } catch (\Exception $e) {
            $response = [
                'type' => 'error',
                'msg'  => 'Cart Can Not be Removed!!'
            ];
        }
        return response()->json($response);
    }

    public function ajaxCartItemsRefresh()
    {
        $couponPercent = 0;
        $couponAmount = 0;
        if (Session::has('coupon') && Session::get('coupon')['coupon_status'] == 'applied') {
            $couponPercent = Session::get('coupon')['coupon_percent'];
            $couponAmount = Session::get('coupon')['coupon_amount'];
        }
        $taxPercent = config('cart.tax');
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        $cartPriceTotal = Cart::priceTotal();
        $cartCount = Cart::count();
        $cartContents = Cart::content();
        $cartTax = Cart::tax();

        return response()->json([
            'cartTotal'      => $cartTotal,
            'cartSubtotal'   => $cartSubtotal,
            'cartPriceTotal' => $cartPriceTotal,
            'cartCount'      => $cartCount,
            'cartContents'   => $cartContents,
            'taxAmount'      => $cartTax,
            'taxPercent'     => $taxPercent,
            'couponAmount'   => $couponAmount,
            'couponPercent'  => $couponPercent,
        ]);
    }

    public function ajaxCartQtyUpdate(Request $request): JsonResponse
    {
        $request->validate([
            'rowId'    => ['required', 'string'],
            'quantity' => ['required', 'integer'],
        ]);
        $response = [];
        try {
            Cart::update($request->rowId, $request->quantity);
            if (Session::has('coupon')) {
                $coupon = Coupon::find(Session::get('coupon')['coupon_id']);
                self::applyCouponAlgo($coupon);
            }
            $response = [
                'type' => 'success',
                'msg'  => 'Cart updated!!'
            ];
        } catch (\Exception $e) {
            $response = [
                'type' => 'error',
                'msg'  => 'Cart Can Not be Updated!!'
            ];
        }
        return response()->json($response);
    }

    public function ajaxCouponApply(Request $request)
    {
        $request->validate([
            'coupon_code' => ['required', 'string'],
        ]);
        if (Session::has('coupon') && Session::get('coupon')['coupon_status'] == 'applied') {
            return response()->json([
                'type' => 'info',
                'msg'  => 'Sorry, You have already applied a coupon code!!'
            ]);
        }
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        if (!$coupon) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Sorry, Invalid Coupon!!'
            ]);
        }
        if ($coupon->coupon_enable > Carbon::now() || $coupon->coupon_expiry < Carbon::now()) {
            return response()->json([
                'type' => 'error',
                'msg'  => 'Sorry, Coupon is not available!!'
            ]);
        }

        self::applyCouponAlgo($coupon);

        return response()->json([
            'type' => 'success',
            'msg'  => 'Coupon has applied!!'
        ]);
    }

    public function ajaxCouponRemove(Request $request)
    {
        if (Session::get('coupon')) {

            Cart::setGlobalDiscount(0);

            Session::forget('coupon');
            return response()->json([
                'type' => 'success',
                'msg'  => 'Coupon Removed!!'
            ]);
        }
        return response()->json([
            'type' => 'info',
            'msg'  => 'You have not applied any coupon yet!!!!'
        ]);
    }

    public static function applyCouponAlgo($coupon)
    {
        $cartPriceTotal = (float)str_replace(',', '', Cart::priceTotal());

        $coupon_amount = $coupon->discount_amount;
        if ($coupon->discount_type == 'fixed_cart') {
            $coupon_amount = ($coupon->discount_amount * 100) / $cartPriceTotal;
        }

        Cart::setGlobalDiscount($coupon_amount);
        $coupon_discount = ($cartPriceTotal * $coupon_amount) / 100;
        //Store The data In to session
        $sessionValue = [
            'coupon' => [
                'coupon_id'      => $coupon->id,
                'coupon_name'    => $coupon->name,
                'coupon_code'    => $coupon->code,
                'coupon_percent' => number_format($coupon_amount, '2', '.', ','),
                'coupon_amount'  => $coupon_discount,
                'coupon_status'  => 'applied',
            ],
        ];

        Session::put('coupon', $sessionValue['coupon']);
    }

    public function ajaxAddToCart(Request $request)
    {
        $request->validate([
            'product_id' => ['integer', 'required'],
            'quantity'   => ['integer', 'required'],
        ]);

        self::addToCartAlgo($request);

        return response()->json([
            'type' => 'info',
            'msg'  => 'Product added to cart!!'
        ]);
    }
    public static function addToCartAlgo($request)
    {
        $product = Product::active()->with('meta')->findOrFail($request->product_id);
        Cart::add([
            'id'      => $product->id,
            'name'    => $product->title,
            'qty'     => $request->quantity,
            'price'   => $product->meta->sale_price ?? $product->meta->regular_price,
            'weight'  => 0,
            'options' => [
                'slug'  => $product->slug,
                'image' => $product->image,
            ]
        ]);
    }
}
