@extends('frontend.layouts.app')

@section('title')
    Order #{{ $order->id }}
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-2">
            @include('frontend.user.common.sidebar')
            <!-- /.nav-tabs #product-tabs -->
            </div>
            <div class="col-md-10">
                <div class="order-view-wrapper">
                    <p class="mov-order">Order <span># {{ $order->id }}</span> was placed on
                        <span>{{ $order->created_at->format('M d, Y') }}</span> and currently
                        on<span> {{ ucfirst($order->status) }}</span></p>
                    <!-- Order Overview-->
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
                    <!-- Order Overview-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="order-overview">
                                <h3>Billing Address</h3>
                                <ul class="customer-info">
                                    <li>{{ $order->customer->company_name ?? '' }}</li>
                                    <li>{{ $order->customer->first_name ?? '' }} {{ $order->customer->last_name ?? '' }}</li>
                                    <li>{{ $order->customer->address ?? '' }}</li>
                                    <li>{{ $order->customer->postcode ?? '' }} {{ $order->customer->city ?? '' }}</li>
                                    <li>{{ $order->customer->state ?? ''}}, {{ $order->customer->country ?? ''}}</li>
                                    <li></li>
                                    <li>{{ $order->customer->phone ?? ''}}</li>
                                    <li>{{ $order->customer->email ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order-overview">
                                <h3>Shipping Address</h3>
                                <ul class="customer-info">
                                    <li>{{ $order->orderShippedAddress->company_name ?? '' }}</li>
                                    <li>{{ $order->orderShippedAddress->first_name ?? '' }} {{ $order->orderShippedAddress->last_name ?? '' }}</li>
                                    <li>{{ $order->orderShippedAddress->address ?? '' }}</li>
                                    <li>{{ $order->orderShippedAddress->postcode ?? '' }} {{ $order->orderShippedAddress->city ?? '' }}</li>
                                    <li>{{ $order->orderShippedAddress->state ?? ''}}, {{ $order->orderShippedAddress->country ?? ''}}</li>
                                    <li></li>
                                    <li>{{ $order->orderShippedAddress->phone ?? ''}}</li>
                                    <li>{{ $order->orderShippedAddress->email ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
