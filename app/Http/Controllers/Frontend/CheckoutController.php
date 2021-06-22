<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\Frontend\CheckoutAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CheckoutRequest;
use App\Models\Orders;
use App\Models\ShipCountry;
use App\Models\ShipDistrict;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    //Checkout View
    public function index()
    {
        $cartData = [
            'cartContents'   => Cart::content(),
            'cartPriceTotal' => Cart::priceTotal(),
            'cartSubTotal'   => Cart::subtotal(),
            'cartTotal'      => Cart::total(),
            'taxAmount'      => Cart::tax(),
            'taxPercent'     => config('cart.tax'),
        ];
        $countries = ShipCountry::orderBy('country_name', 'ASC')->get();
        $firstCountry = ShipCountry::orderBy('country_name', 'ASC')->first();
        $states = ShipDistrict::where('country_id', $firstCountry->id)->orderBy('district_name', 'ASC')->get();
        return view('frontend.core.checkout', compact('cartData', 'countries', 'states'));
    }

    //CheckOut Store
    public function store(CheckoutRequest $request, CheckoutAction $checkoutAction)
    {
        $response = $checkoutAction->makeCheckout($request);

        if ($response['status'] == true) {
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            Cart::destroy();

            return redirect()->route('frontend.order.success', $response['order']->id);
        }

        return back()->with('error_msg', $response['msg']);

    }

    //Order Success
    public function orderSuccess($id)
    {
        $order = Orders::with(['customer', 'orderCoupon', 'orderTax', 'orderItems', 'orderPayment'])->findOrFail($id);

        return view('frontend.core.order-success', compact('order'));
    }

    //All Ajax Function
    public function ajaxCheckoutBillingState(Request $request)
    {
        $request->validate([
            'country_id' => ['required'],
        ]);
        $country = ShipCountry::where('country_name',$request->country_id)->first();
        $states = ShipDistrict::where('country_id', $country->id)->orderBy('district_name', 'ASC')->get();

        return response()->json($states);

    }

    //Ajax Card Details Check
    public function ajaxStripeCheck(Request $request)
    {
        $request->validate([
            'card'  => ['required'],
            'month' => ['required'],
            'year'  => ['required'],
            'cvc'   => ['required'],
        ]);
        $response = '';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));
        try {
            $token = $stripe->tokens->create([
                'card' => [
                    'number'    => $request->card,
                    'exp_month' => $request->month,
                    'exp_year'  => $request->year,
                    'cvc'       => $request->cvc,
                ]
            ]);

            $response = [
                'status' => true,
                'msg'    => 'Card Verified',
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'msg'    => $e->getMessage(),
            ];
            if (str_contains($e->getMessage(), 'Please check your internet connection and try again')) {
                $response['msg'] = 'Please check your internet connection and try again.';
            }
        }
        return response()->json($response);
    }

}
