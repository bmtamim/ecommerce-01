@extends('frontend.layouts.app')

@section('title') {{ __('Checkout') }} @endsection

@section('content')
    <div class="col-lg-12">
        @if(session()->has('error_msg'))
            <div class="alert alert-danger">{{ session()->get('error_msg') }}</div>
        @endif
        <div class="checkout-box ">
            <form action="{{ route('frontend.checkout.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel-group checkout-steps" id="accordion">

                            <!-- Billing Step  -->
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion"
                                           href="#billingInfo">
                                            <span>1</span>Billing Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="billingInfo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billing_first_name">{{ __('First Name *') }}</label>
                                                    <input type="text" name="billing_first_name" class="form-control"
                                                           id="billing_first_name">
                                                    @error('billing_first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billing_last_name">{{ __('Last Name *') }}</label>
                                                    <input type="text" name="billing_last_name" class="form-control"
                                                           id="billing_last_name">
                                                    @error('billing_last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_company_name">{{ __('Company Name (optional)') }}</label>
                                                    <input type="text" name="billing_company_name" class="form-control"
                                                           id="billing_company_name">
                                                    @error('billing_company_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_country">{{ __('Country *') }}</label>
                                                    <select class="form-control" name="billing_country"
                                                            id="billing_country">
                                                        @foreach($countries as $key => $country)
                                                            <option
                                                                value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('billing_country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_state">{{ __('District*') }}</label>
                                                    <select class="form-control" name="billing_state"
                                                            id="billing_state">
                                                        @foreach($states as $key => $state)
                                                            <option
                                                                value="{{ $state->district_name }}">{{ $state->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('billing_state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_city">{{ __('City / Town') }}</label>
                                                    <input type="text" name="billing_city" class="form-control"
                                                           id="billing_city">
                                                    @error('billing_city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_address">{{ __('Street Address *') }}</label>
                                                    <input type="text" name="billing_address" id="billing_address"
                                                           class="form-control">
                                                    @error('billing_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_postcode">{{ __('Postcode / ZIP (optional)') }}</label>
                                                    <input type="text" name="billing_postcode" id="billing_postcode"
                                                           class="form-control">
                                                    @error('billing_postcode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_phone">{{ __('Phone *') }}</label>
                                                    <input type="tel" name="billing_phone" id="billing_phone"
                                                           class="form-control">
                                                    @error('billing_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="billing_email">{{ __('Email *') }}</label>
                                                    <input type="text" name="billing_email" id="billing_email"
                                                           class="form-control">
                                                    @error('billing_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" name="ship_to_different_address"
                                                           id="ship_to_different_address">
                                                    <label
                                                        for="ship_to_different_address">{{ __('Ship to different Address?') }}</label>

                                                    @error('billing_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Billing Step  -->

                            <!-- Shipping Step  -->
                            <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a id="ship-toggle-btn" data-toggle="collapse" class="collapsed"
                                           data-parent="#accordion"
                                           href="#shippingInfo">
                                            <span>2</span>Shipping Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="shippingInfo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shipping_first_name">{{ __('First Name *') }}</label>
                                                    <input type="text" name="shipping_first_name" class="form-control"
                                                           id="shipping_first_name">
                                                    @error('shipping_first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shipping_last_name">{{ __('Last Name *') }}</label>
                                                    <input type="text" name="shipping_last_name" class="form-control"
                                                           id="shipping_last_name">
                                                    @error('shipping_last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_company_name">{{ __('Company Name (optional)') }}</label>
                                                    <input type="text" name="shipping_company_name" class="form-control"
                                                           id="shipping_company_name">
                                                    @error('shipping_company_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_country">{{ __('Country *') }}</label>
                                                    <select class="form-control" name="shipping_country"
                                                            id="shipping_country">
                                                        @foreach($countries as $key => $country)
                                                            <option
                                                                value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('shipping_country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_state">{{ __('District*') }}</label>
                                                    <select class="form-control" name="shipping_state"
                                                            id="shipping_state">
                                                        @foreach($states as $key => $state)
                                                            <option
                                                                value="{{ $state->district_name }}">{{ $state->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('shipping_state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_city">{{ __('City / Town') }}</label>
                                                    <input type="text" name="shipping_city" class="form-control"
                                                           id="shipping_city">
                                                    @error('shipping_city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_address">{{ __('Street Address *') }}</label>
                                                    <input type="text" name="shipping_address" id="shipping_address"
                                                           class="form-control">
                                                    @error('shipping_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_postcode">{{ __('Postcode / ZIP (optional)') }}</label>
                                                    <input type="text" name="shipping_postcode" id="shipping_postcode"
                                                           class="form-control">
                                                    @error('shipping_postcode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_phone">{{ __('Phone *') }}</label>
                                                    <input type="tel" name="shipping_phone" id="shipping_phone"
                                                           class="form-control">
                                                    @error('shipping_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="shipping_email">{{ __('Email *') }}</label>
                                                    <input type="text" name="shipping_email" id="shipping_email"
                                                           class="form-control">
                                                    @error('shipping_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping Step  -->
                            <div class="panel panel-default">
                                <div class="panel-bdoy">
                                    <div class="form-group">
                                        <label for="order_notes">{{ __('Order Notes') }}</label>
                                        <textarea name="order_notes" id="order_notes" rows="4"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-5">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">{{ __('Order Details') }}</h4>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table checkout_order_details">
                                                <thead>
                                                <tr>
                                                    <th class="product_name">{{ __('Product') }}</th>
                                                    <th class="product_total">{{ __('Subtotal') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cartData['cartContents'] as $cartContent)
                                                    <tr class="cart_item">
                                                        <td class="product_name"> {{ $cartContent->name }} <strong
                                                                class="product_quantity">× {{ $cartContent->qty }}</strong>
                                                        </td>
                                                        <td class="product_total">
                                                            ${{ number_format(($cartContent->price * $cartContent->qty),2,'.',',') }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr class="cart_subtotal cart_foot_row">
                                                    <th class="tex-left">Subtotal</th>
                                                    <td class="text-right">${{ $cartData['cartPriceTotal'] }}</td>
                                                </tr>
                                                @if(session()->has('coupon'))
                                                    <tr class="cart_coupon cart_foot_row">
                                                        <th class="tex-left">
                                                            Coupon({{ session()->get('coupon')['coupon_name'] }})
                                                        </th>
                                                        <td class="text-right">-
                                                            ${{ session()->get('coupon')['coupon_amount'] }}</td>
                                                    </tr>
                                                @endif
                                                <tr class="cart_tax cart_foot_row">
                                                    <th class="tex-left">Tax({{ $cartData['taxPercent'].'%' }})</th>
                                                    <td class="text-right">+ ${{ $cartData['taxAmount'] }}</td>
                                                </tr>
                                                <tr class="cart_total cart_foot_row">
                                                    <th class="tex-left">Total</th>
                                                    <td class="text-right">${{ $cartData['cartTotal'] }}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                        <div class="panel panel-default py-2">
                            <div class="checkout-payment-wrapper" id="accordion">
                                <ul class="payment-method-box-wrapper">
                                    <li class="payment-method-wrapper">
                                        <div class="pm-box-header">
                                            <input type="radio" id="payment-method-cod" name="payment_method"
                                                   value="cod" checked>
                                            <label for="payment-method-cod">Cash On Delivery</label>
                                        </div>
                                        <div class="pm-box-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto
                                                aspernatur doloremque exercitationem, fugiat sit? Molestiae nesciunt
                                                officia vitae? Amet!</p>
                                        </div>
                                    </li>
                                    <li class="payment-method-wrapper">
                                        <div class="pm-box-header">
                                            <input type="radio" id="payment-method-bank" name="payment_method"
                                                   value="bank">
                                            <label for="payment-method-bank">Bank Transfer</label>
                                        </div>
                                        <div class="pm-box-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto
                                                aspernatur doloremque exercitationem, fugiat sit? Molestiae nesciunt
                                                officia vitae? Amet!</p>
                                        </div>
                                    </li>
                                    <li class="payment-method-wrapper">
                                        <div class="pm-box-header">
                                            <input type="radio" id="payment-method-stripe" name="payment_method"
                                                   value="stripe">
                                            <label for="payment-method-stripe">Debit / Credit card</label>
                                        </div>
                                        <div class="pm-box-body">
                                            <div class="stripe-preload">
                                                <div class="loader"></div>
                                            </div>
                                            <div id="stripe-error" class="alert alert-danger"></div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="stripe_card_num">Card Number</label>
                                                        <input type="text" name="stripe_card_num" id="stripe_card_num"
                                                               class="form-control" placeholder="4242424242424242">
                                                        @error('stripe_card_num')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="stripe_exp_mon">Expiry Month</label>
                                                        <input type="text" name="stripe_exp_mon" id="stripe_exp_mon"
                                                               class="form-control" placeholder="01">
                                                        @error('stripe_exp_mon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stripe_exp_year">Expiry Year</label>
                                                        <input type="text" name="stripe_exp_year" id="stripe_exp_year"
                                                               class="form-control" placeholder="yyyy">
                                                        @error('stripe_exp_year')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stripe_cvc">CVC</label>
                                                        <input type="password" name="stripe_cvc" id="stripe_cvc"
                                                               class="form-control" placeholder="123">
                                                        @error('stripe_cvc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout-payment-btn-wrap">
                                <p>Your personal data will be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our privacy policy.</p>

                                <p class="form-group">
                                    <input type="checkbox" name="terms" id="terms">
                                    <label for="terms">I agree with terms & conditions</label>
                                </p>

                                <div class="form-group">
                                    <button type="submit" id="checkout-btn" class="btn btn-primary checkout-btn">Place
                                        Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $('#billing_country , #shipping_country').select2();
        $('#billing_state , #shipping_state').select2();
        $('#shipping_country').select2();
        $('#shipping_state').select2();
        //    Billing Country On change
        $(document).on('change', '#billing_country', function () {
            let country_id = $(this).val();
            if (country_id != '') {
                $.ajax({
                    url: '{{ route('frontend.ajax.checkoutBillingState') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {"country_id": country_id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        let html = '';
                        $.each(data, function (index, state) {
                            html += `<option value="${state.district_name}">${state.district_name}</option>`;
                        });
                        $('#billing_state').html(html);
                    }
                });
            }
        });

        //  Shipping Country On change
        $(document).on('change', '#shipping_country', function () {
            let country_id = $(this).val();
            if (country_id != '') {
                $.ajax({
                    url: '{{ route('frontend.ajax.checkoutBillingState') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {"country_id": country_id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        let html = '';
                        $.each(data, function (index, state) {
                            html += `<option value="${state.district_name}">${state.district_name}</option>`;
                        });
                        $('#shipping_state').html(html);
                    }
                });
            }
        });

        //Ship To different
        $(document).on('change', '#ship_to_different_address', function () {
            if ($(this).is(':checked')) {
                $('#ship-toggle-btn').click();
            }
        });
        //Payment Method On Change
        $(document).on('change', 'input[type="radio"][name="payment_method"]', function () {
            $(this).parents('li.payment-method-wrapper').siblings().children('.pm-box-body').slideUp();
            $(this).parents('li.payment-method-wrapper').children('.pm-box-body').slideDown();

            if ($(this).val() == 'stripe') {
                $('#checkout-btn').attr('disabled', true);
            } else {
                $('#checkout-btn').attr('disabled', false);
            }
        });

        $(document).on('blur', '#stripe_card_num , #stripe_exp_mon , #stripe_exp_year , #stripe_cvc', function () {
            checkCardDetails();
        });

        function checkCardDetails() {
            let payment_method = $('input[type="radio"][name="payment_method"]').val();
            let card = $('#stripe_card_num').val();
            let month = $('#stripe_exp_mon').val();
            let year = $('#stripe_exp_year').val();
            let cvc = $('#stripe_cvc').val();
            if (card != '' && month != '' && year != '' && cvc != '') {
                $.ajax({
                    url: '{{ route('frontend.ajax.ajaxStripeCheck') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {"card": card, "month": month, "year": year, "cvc": cvc, "_token": "{{ csrf_token() }}"},
                    beforeSend: function () {
                        $('.stripe-preload').fadeIn();
                    },
                    success: function (data) {
                        if (data.status === false) {
                            $('#checkout-btn').attr('disabled', true);
                            $('#stripe-error').html(data.msg);
                            $('#stripe-error').slideDown();
                        } else {
                            $('#checkout-btn').attr('disabled', false);
                            $('#stripe-error').html();
                            $('#stripe-error').slideUp();
                        }
                    },
                    complete: function () {
                        $('.stripe-preload').fadeOut();
                    },
                });
            }
        }

    </script>
@endpush
