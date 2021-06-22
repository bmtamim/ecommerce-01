@extends('frontend.layouts.app')

@section('title','Order Received')

@section('content')
    <div class="col-lg-12">
        <div class="row d-flex justify-content-center order-success-wrapper">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <!-- Order Success Box-->
                        <div class="order-success-box">
                            <!-- Order Success h2-->
                            <h2 class="title">Thank you. Your order has been received.</h2>
                            <!-- Order Mini Overview-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="order-mini-overview">
                                        Order number:
                                        <strong>{{ $order->id }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="order-mini-overview">
                                        Date:
                                        <strong>{{ $order->created_at->format('M d, Y') }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="order-mini-overview">
                                        Total:
                                        <strong>{{ '$'.numFormat($order->net_total) }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="order-mini-overview border-0">
                                        Payment method:
                                        @if($order->orderPayment->payment_method == 'cod')
                                            <strong>{{ __('Cheque Payment') }}</strong>
                                        @elseif($order->orderPayment->payment_method == 'bank')
                                            <strong>{{ __('Bank Transfer') }}</strong>
                                        @elseif($order->orderPayment->payment_method == 'stripe')
                                            <strong>{{ __('Credit / Debit card') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Order Mini Overview-->
                            <div class="order-overview">
                                <h3>Order Details</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table checkout_order_details">
                                            <thead>
                                            <tr>
                                                <th class="product_name">{{ __('Product') }}</th>
                                                <th class="product_total">{{ __('Subtotal') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->orderItems as $orderItem)
                                                <tr class="cart_item">
                                                    <td class="product_name"> {{ $orderItem->item_name }} <strong
                                                            class="product_quantity">× {{ $orderItem->item_qty }}</strong>
                                                    </td>
                                                    <td class="product_total">
                                                        ${{ numFormat($orderItem->item_price * $orderItem->item_qty) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="cart_subtotal cart_foot_row">
                                                <th class="tex-left">Payment Method</th>
                                                <td class="text-right">
                                                    @if($order->orderPayment->payment_method == 'cod')
                                                        <strong>{{ __('Cheque Payment') }}</strong>
                                                    @elseif($order->orderPayment->payment_method == 'bank')
                                                        <strong>{{ __('Bank Transfer') }}</strong>
                                                    @elseif($order->orderPayment->payment_method == 'stripe')
                                                        <strong>{{ __('Credit / Debit card') }}</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="cart_subtotal cart_foot_row">
                                                <th class="tex-left">Subtotal</th>
                                                <td class="text-right">${{ numFormat($order->total_sale) }}</td>
                                            </tr>
                                            @if($order->orderCoupon != null)
                                                <tr class="cart_coupon cart_foot_row">
                                                    <th class="tex-left">
                                                        Coupon({{ $order->orderCoupon->coupon_name }})
                                                    </th>
                                                    <td class="text-right">-
                                                        ${{ numFormat($order->orderCoupon->discount_amount) }}</td>
                                                </tr>
                                            @endif
                                            <tr class="cart_tax cart_foot_row">
                                                <th class="tex-left">Tax</th>
                                                <td class="text-right">+ ${{ numFormat($order->tax_total) }}</td>
                                            </tr>
                                            <tr class="cart_total cart_foot_row">
                                                <th class="tex-left">Total</th>
                                                <td class="text-right">${{ numFormat($order->net_total) }}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order Success Box-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
