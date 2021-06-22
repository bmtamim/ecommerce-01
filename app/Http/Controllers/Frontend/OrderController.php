<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::guard('web')->id())->first();
        $orders = collect();
        if ($customer){
            $orders = Orders::latest('id')->where('customer_id', $customer->id)->with(['orderItems', 'orderCoupon', 'orderTax', 'orderPayment'])->get();
        }

        return view('frontend.user.orders', compact('orders'));
    }

    //View Single Order
    public function orderView($id)
    {
        $customer = Customer::where('user_id', Auth::guard('web')->id())->first();
        if (!$customer){
            abort(404);
        }
        $order = Orders::where('customer_id', $customer->id)->with(['customer','orderItems', 'orderCoupon', 'orderTax', 'orderPayment','orderShippedAddress'])->findOrFail($id);

        return view('frontend.user.order-view', compact('order'));
    }
}
