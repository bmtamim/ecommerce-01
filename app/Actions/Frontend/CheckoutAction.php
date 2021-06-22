<?php


namespace App\Actions\Frontend;


use App\Mail\InvoiceToCustomer;
use App\Models\Customer;
use App\Models\OrderCoupon;
use App\Models\OrderItems;
use App\Models\OrderPayment;
use App\Models\Orders;
use App\Models\OrderShippingAddress;
use App\Models\OrderTax;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use League\ISO3166\ISO3166;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\True_;
use Stripe\Stripe;

class CheckoutAction
{
    public function makeCheckout($request): array
    {
        $response = [];
        $orderTransaction = null;
        if ($request->payment_method != 'stripe') {
            $response = self::makeOrder($request);
        }

        if ($request->payment_method == 'stripe') {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));
            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number'    => $request->stripe_card_num,
                        'exp_month' => $request->stripe_exp_mon,
                        'exp_year'  => $request->stripe_exp_year,
                        'cvc'       => $request->stripe_cvc,
                    ]
                ]);
            } catch (\Exception $e) {
                $getMessage = $e->getMessage();

                if (str_contains($e->getMessage(), 'Please check your internet connection and try again')) {
                    $getMessage = 'Please check your internet connection and try again.';
                }

                return [
                    'status' => false,
                    'msg'    => $getMessage,
                ];
            }

            $customer = self::createStripeCustomer($stripe, $token, $request);

            $charges = $stripe->charges->create([
                'customer'    => $customer['id'],
                'amount'      => formattedToFloat(Cart::total()) * 100,
                'currency'    => 'usd',
                'description' => 'Laravel Ecommerce',
            ]);
            if ($charges) {
                $orderTransaction = self::makeOrder($request, $charges);
                $response = $orderTransaction;
            } else {
                $response = [
                    'status' => false,
                    'msg'    => 'Order Failed',
                ];
            }
        }


        return $response;
    }

    public static function makeOrder($request, $charges = null)
    {
        $orderTransaction = DB::transaction(function () use ($request, $charges) {
            $customer = Customer::where('user_id', Auth::guard('web')->id())->first();
            if ($customer) {
                self::updateCustomer($request, $customer);
            } else {
                $customer = self::createCustomer($request);
            }

            //Insert Order Data
            $order = self::createOrder($customer, $request, 'hold');

            if ($order) {
                if ($charges) {
                    self::makePayment($order, $request, 'success', $charges['id']);
                } else {
                    self::makePayment($order, $request, 'pending');
                }
            }

            return [
                'status' => true,
                'order'  => $order,
            ];
        });

        Mail::to($request->billing_email)->send(new InvoiceToCustomer($orderTransaction['order']));

        return $orderTransaction;
    }

    //Create customer
    public static function createCustomer($request)
    {
        return Customer::create([
            'user_id'      => Auth::guard('web')->id(),
            'first_name'   => $request->billing_first_name,
            'last_name'    => $request->billing_last_name,
            'email'        => $request->billing_email,
            'company_name' => $request->billing_company_name,
            'country'      => $request->billing_country,
            'state'        => $request->billing_state,
            'city'         => $request->billing_city,
            'address'      => $request->billing_address,
            'postcode'     => $request->billing_postcode,
            'phone'        => $request->billing_phone,
        ]);
    }

    //Create customer
    public static function updateCustomer($request, $customer)
    {
        $customer->update([
            'user_id'      => Auth::guard('web')->id(),
            'first_name'   => $request->billing_first_name,
            'last_name'    => $request->billing_last_name,
            'email'        => $request->billing_email,
            'company_name' => $request->billing_company_name,
            'country'      => $request->billing_country,
            'state'        => $request->billing_state,
            'city'         => $request->billing_city,
            'address'      => $request->billing_address,
            'postcode'     => $request->billing_postcode,
            'phone'        => $request->billing_phone,
        ]);
    }

    public static function createOrder($customer, $request, $status)
    {
        $order = Orders::create([
            'customer_id'        => $customer->id,
            'num_items_sold'     => Cart::count(),
            'total_sale'         => formattedToFloat(Cart::priceTotal()),
            'tax_total'          => formattedToFloat(Cart::tax()),
            'shipping_total'     => 0,
            'net_total'          => formattedToFloat(Cart::total()),
            'returning_customer' => 1,
            'status'             => $status,
        ]);

        //Order Item
        if (Cart::content()) {
            foreach (Cart::content() as $orderItem) {
                OrderItems::insert([
                    'order_id'   => $order->id,
                    'item_id'    => $orderItem->id,
                    'item_name'  => $orderItem->name,
                    'item_qty'   => $orderItem->qty,
                    'item_price' => $orderItem->price,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        //Order Coupon
        if (session()->has('coupon')) {
            OrderCoupon::insert([
                'order_id'         => $order->id,
                'coupon_id'        => session()->get('coupon')['coupon_id'],
                'coupon_name'      => session()->get('coupon')['coupon_name'],
                'coupon_code'      => session()->get('coupon')['coupon_code'],
                'discount_amount'  => session()->get('coupon')['coupon_amount'],
                'discount_percent' => session()->get('coupon')['coupon_percent'],
                'created_at'       => Carbon::now(),
            ]);
        }
        //Order Tax
        if (config('cart.tax') != 0 || config('cart.tax') != null) {
            OrderTax::insert([
                'order_id'    => $order->id,
                'order_tax'   => formattedToFloat(Cart::tax()),
                'tax_percent' => formattedToFloat(config('cart.tax')),
                'total_tax'   => formattedToFloat(Cart::tax()),
                'created_at'  => Carbon::now(),
            ]);
        }
        //Insert ship address
        if ($request->ship_to_different_address == true) {
            OrderShippingAddress::insert([
                'order_id'     => $order->id,
                'first_name'   => $request->shipping_first_name,
                'last_name'    => $request->shipping_last_name,
                'email'        => $request->shipping_email,
                'company_name' => $request->shipping_company_name,
                'country'      => $request->shipping_country,
                'state'        => $request->shipping_state,
                'city'         => $request->shipping_city,
                'address'      => $request->shipping_address,
                'postcode'     => $request->shipping_postcode,
                'phone'        => $request->shipping_phone,
                'created_at'   => Carbon::now(),
            ]);
        }

        return $order;
    }

    public static function makePayment($order, $request, $status, $transactionId = null)
    {
        return OrderPayment::insert([
            'order_id'       => $order->id,
            'payment_method' => $request->payment_method,
            'amount'         => formattedToFloat(Cart::total()),
            'status'         => $status,
            'transaction_id' => $transactionId,
            'created_at'     => Carbon::now(),
        ]);
    }

    public static function createStripeCustomer($stripe, $token, $request)
    {
        return $stripe->customers->create([
            'name'     => $request->billing_first_name . ' ' . $request->billing_last_name,
            'email'    => $request->billing_email,
            'phone'    => $request->billing_phone,
            'address'  => [
                'country'     => 'BD',
                'city'        => $request->billing_city,
                'state'       => $request->billing_state,
                'line1'       => $request->billing_address,
                'postal_code' => $request->billing_postcode,
            ],
            'metadata' => [
                'company_name' => $request->billing_company_name,
            ],
            'source'   => $token['id'],
        ]);
    }

}
