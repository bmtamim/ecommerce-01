@extends('frontend.layouts.app')

@section('title') {{ __('Carts') }} @endsection

@section('content')
    <div class="col-lg-12">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Remove</th>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item">Grandtotal</th>
                            </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
							<span class="">
								<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
                                    </div><!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                            </tfoot>
                            <tbody id="cart-details-wrapper">
                            @forelse($cartContents as $key => $cartContent)
                                <tr>
                                    <td class="romove-item"><a data-row-id="{{ $cartContent->rowId }}" href="#"
                                                               onclick="removeCart('{{ $cartContent->rowId }}')"
                                                               title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail"
                                           href="{{ route('frontend.product.details',$cartContent->options->slug) }}">
                                            <img
                                                src="{{ $cartContent->options->image ? asset('storage/products/'.$cartContent->options->image) : placeholderImage($cartContent->name) }}"
                                                alt="" width="90px">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a
                                                href="{{ route('frontend.product.details',$cartContent->options->slug) }}">{{ $cartContent->name ?? __('Product Title') }}</a>
                                        </h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                            <div class="cart-product-info">
                                                <!--<span class="product-color">COLOR:<span>Blue</span></span> -->
                                            </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <button data-row-id="{{ $cartContent->rowId }}" id="cart-decreament"
                                                class="btn-danger btn-sm rounded"><i class="fa fa-minus"></i></button>
                                        <input class="cart-qty-input" type="text" value="{{ $cartContent->qty }}"
                                               min="1" disabled>
                                        <button data-row-id="{{ $cartContent->rowId }}" id="cart-increament"
                                                class="btn-success btn-sm rounded"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td class="cart-product-sub-total"><span
                                            class="cart-sub-total-price">${{ number_format(($cartContent->price * $cartContent->qty),'2','.',',') }}</span>
                                    </td>
                                    <td class="cart-product-grand-total"><span
                                            class="cart-grand-total-price">${{ number_format((($cartContent->price * $cartContent->qty) + ((($cartContent->price * $cartContent->qty) * config('cart.tax')) / 100)),'2','.',',')  }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"><h5 class="text-center text-danger">{{ __('Cart is Empty!!') }}</h5>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Estimate shipping and tax</span>
                                <p>Enter your destination to get shipping and tax.</p>
                            </th>
                        </tr>
                        </thead><!-- /thead -->
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class="info-title control-label">Country <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker">
                                        <option>--Select options--</option>
                                        <option>India</option>
                                        <option>SriLanka</option>
                                        <option>united kingdom</option>
                                        <option>saudi arabia</option>
                                        <option>united arab emirates</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="info-title control-label">State/Province <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker">
                                        <option>--Select options--</option>
                                        <option>TamilNadu</option>
                                        <option>Kerala</option>
                                        <option>Andhra Pradesh</option>
                                        <option>Karnataka</option>
                                        <option>Madhya Pradesh</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="info-title control-label">Zip/Postal Code</label>
                                    <input type="text" class="form-control unicase-form-control text-input"
                                           placeholder="">
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Discount Code</span>
                                <p>Enter your coupon code if you have one..</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <form action="{{ route('frontend.ajax.couponApply') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="coupon_code" name="coupon_code"
                                               class="form-control unicase-form-control text-input"
                                               placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" id="coupon_submit" class="btn-upper btn btn-primary">APPLY
                                            COUPON
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <div class="cart-sub-total" id="cart-subtotal">
                                    Subtotal<span class="inner-left-md">${{ $cartDetails['priceTotal'] }}</span>
                                </div>
                                <div class="cart-sub-total @if(!session()->has('coupon')) d-none @endif"
                                     id="cart-coupon-row">
                                    @if(session()->has('coupon'))
                                        Coupon<span>({{ session()->get('coupon')['coupon_percent'].'%' }})</span> <span
                                            class="inner-left-md">- ${{ session()->get('coupon')['coupon_amount'] }}</span>
                                        <a href="#" id="remove-coupon-btn" class="icon pl-1"><i
                                                class="fa fa-trash-o"></i></a>
                                    @endif
                                </div>
                                @if($cartDetails['taxAmount'] != 0)
                                    <div class="cart-sub-total" id="cart-tax">
                                        Tax({{ $cartDetails['taxPercent'].'%' }})<span
                                            class="inner-left-md">{{ '+ $'.$cartDetails['taxAmount'] }}</span>
                                    </div>
                                @endif
                                <div class="cart-grand-total" id="cart-total">
                                    Grand Total<span class="inner-left-md">${{ $cartDetails['total'] }}</span>
                                </div>
                            </th>
                        </tr>
                        </thead><!-- /thead -->
                        <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <a href="{{ route('frontend.checkout.index') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT
                                    </a>
                                    <span class="">Checkout with multiples address!</span>
                                </div>
                            </td>
                        </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->


            </div><!-- /.shopping-cart -->
        </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(document).on('click', '#cart-increament', function () {
            let qtyInput = parseInt($(this).siblings('input.cart-qty-input').val()) + 1;
            let rowId = $(this).data('row-id');
            $.ajax({
                url: '{{ route('frontend.ajax.cartQtyUpdate') }}',
                method: 'POST',
                dataType: 'json',
                data: {"rowId": rowId, "quantity": qtyInput, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg,
                    });
                    refreshMiniCart();
                    refreshCart();
                }
            });
            $(this).siblings('input.cart-qty-input').val(qtyInput);
        });
        $(document).on('click', '#cart-decreament', function () {
            let getQtyInput = parseInt($(this).siblings('input.cart-qty-input').val());
            if (getQtyInput > 1) {
                let qtyInput = getQtyInput - 1;
                let rowId = $(this).data('row-id');
                $.ajax({
                    url: '{{ route('frontend.ajax.cartQtyUpdate') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {"rowId": rowId, "quantity": qtyInput, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        toast.fire({
                            type: data.type,
                            icon: data.type,
                            title: data.msg,
                        });
                        refreshMiniCart();
                        refreshCart();
                    }
                });
                $(this).siblings('input.cart-qty-input').val(qtyInput);
            }
        });

        function refreshCart() {
            $.ajax({
                url: '{{ route('frontend.ajaxCartItemsRefresh') }}',
                method: 'POST',
                dataType: 'json',
                data: {"_token": '{{ csrf_token() }}'},
                success: function (data) {
                    let formatter = new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD',
                    });
                    let template = '';
                    let subtotal = '';
                    let total = '';
                    let tax = parseInt({{ config('cart.tax') }});
                    $.each(data.cartContents, function (index, value) {
                        subtotal = formatter.format((value.price * value.qty));
                        total = (value.price * value.qty) + (((value.price * value.qty) * tax) / 100);
                        total = formatter.format(total);

                        template += `<tr>
                                    <td class="romove-item"><a data-row-id="${value.rowId}" onclick="removeCart('${value.rowId}')" href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail"
                                           href="{{ config('app.url').'/product/' }}${value.options.slug}">
                                            <img
                                                src="/storage/products/${value.options.image}"
                                                alt="" width="90px">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a
                                                href="{{ config('app.url').'/product/' }}${value.options.slug}">${value.name}</a>
                                        </h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                        <div class="cart-product-info">
                                            <!--<span class="product-color">COLOR:<span>Blue</span></span> -->
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <button data-row-id="${value.rowId}" id="cart-decreament" class="btn-danger btn-sm rounded"><i class="fa fa-minus"></i></button>
                                        <input class="cart-qty-input" type="text" value="${value.qty}" min="1" disabled>
                                        <button data-row-id="${value.rowId}" id="cart-increament"
                                                class="btn-success btn-sm rounded"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td class="cart-product-sub-total"><span
                                            class="cart-sub-total-price">${subtotal}</span></td>
                                    <td class="cart-product-grand-total"><span
                                            class="cart-grand-total-price">${total} </span>
                                    </td>
                                </tr>`;
                    });
                    $('#cart-details-wrapper').html(template);
                    $('#cart-subtotal span').text(data.cartPriceTotal);
                    $('#cart-tax span').text(data.taxAmount);
                    $('#cart-total span').text(data.cartTotal);
                    if (data.couponAmount != 0) {
                        let couponHtml = ` Coupon<span>(${data.couponPercent + '%'})</span> <span
                                        class="inner-left-md">- ${'$' + data.couponAmount}</span>
                                        <a href="#" id="remove-coupon-btn" class="icon pl-1"><i
                                            class="fa fa-trash-o"></i></a>`;
                        $('#cart-coupon-row').html(couponHtml);
                        $('#cart-coupon-row').removeClass('d-none');
                    } else {
                        let couponHtml = ` Coupon<span>(0%)</span> <span
                                        class="inner-left-md">- $0</span>
                                        <a href="#" id="remove-coupon-btn" class="icon pl-1"><i
                                            class="fa fa-trash-o"></i></a>`;
                        $('#cart-coupon-row').html(couponHtml);
                        $('#cart-coupon-row').addClass('d-none');
                    }
                }
            });
        }

        $(document).on('click', '#coupon_submit', function () {
            event.preventDefault();
            let coupon_code = $('#coupon_code').val();
            if (coupon_code != '') {
                $.ajax({
                    url: '{{ route('frontend.ajax.couponApply') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {"coupon_code": coupon_code, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        toast.fire({
                            type: data.type,
                            icon: data.type,
                            title: data.msg,
                        });
                        refreshMiniCart();
                        refreshCart();
                    }
                });
            } else {
                toast.fire({
                    type: 'info',
                    icon: 'info',
                    title: 'Coupon field is required!!',
                });
            }
        });

        //    Remove Coupon
        $(document).on('click', '#remove-coupon-btn', function () {
            event.preventDefault();
            $.ajax({
                url: '{{ route('frontend.ajax.couponRemove') }}',
                method: 'POST',
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg,
                    });
                    refreshMiniCart();
                    refreshCart();
                }
            });
        });
    </script>
@endpush
