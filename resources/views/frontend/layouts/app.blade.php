<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ config('app.name','Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Style Will link from Specific Page -->
    @stack('styles')
</head>

<body class="cnt-home">
<!-- Header -->
@include('frontend.layouts.partials.header')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            @section('sidebar')
            @show
            @section('content')
            @show
        </div>
        @section('brands')
        @show
    </div>
</div>
<!-- Content -->

<!-- Footer -->

@include('frontend.layouts.partials.footer')

<!-- Product Quick View Modal -->
<div class="modal fade" id="product_quick_view" tabindex="-1" role="dialog" aria-labelledby="productQuickViewLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productQuickViewLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-loader-div">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                            <div class="ml-row"></div>
                        </div>
                    </div>
                </div>
                <div class="row single-product">
                    <div class="col-lg-6">
                        <div class="product-img border-right">
                            <img src="{{ asset('frontend/assets/images/products/p1.jpg') }}"
                                 alt="{{ __('Product Image') }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-info-block">
                            <div class="product-info">
                                <h4 class="modal_product_title">Lorem ipsum dolor.</h4>
                                <div class="price-container">
                                    <div class="price-box modal-price">
                                        <span class="price">$200</span>
                                        <span
                                            class="price-strike">$300</span>
                                    </div>
                                </div>
                                <p class="modal-short-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Et,
                                    totam.</p>
                                <div class="quantity-container info-container">
                                    <form action="{{ route('frontend.addToCart') }}" method="post" id="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input id="qty-input" type="number" value="1" name="quantity"
                                                               min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                                                </button>
                                            </div>
                                        </div><!-- /.row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Quick View Modal -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script>
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    //Modal Close Event
    $('#product_quick_view').on('hidden.bs.modal', function (e) {
        $(this).find('#qty-input').val(1);
        $('.modal-loader-div').fadeIn();
    })
    $(document).on('click', '#add_to_cart', function () {
        event.preventDefault();
        let product_id = $(this).data('product-id');
        $.ajax({
            url: '{{ route('frontend.ajax.product.quickview') }}',
            method: 'GET',
            data: {"id": product_id},
            beforeSend : function (){
                $('.modal-loader-div').fadeIn();
            },
            success: function (data) {
                $('#product_id').val(data.id);
                $('.modal_product_title').text(data.title);
                $('.modal-short-desc').text(data.description);
                if (data.short_description != null){
                    $('.modal-short-desc').text(data.short_description);
                }
                if (data.meta.sale_price != null) {
                    let price = '<span class="price">$' + data.meta.sale_price + '</span> <span class="price-strike">$' + data.meta.regular_price + '</span>';
                    $('.modal-price').html(price);
                } else {
                    $('.modal-price').html('<span class="price">$' + data.meta.regular_price + '</span>');
                }
                $('.product-img img').attr('src', '/storage/products/' + data.image);
            },
            complete : function (){
                $('.modal-loader-div').fadeOut();
            },
        });
    });

    function qtyIncreament() {
        let qtyVal = parseInt($('#qty-input').val());
        $('#qty-input').val(qtyVal + 1);
    }

    function qtydecreament() {
        let qtyValue = parseInt($('#qty-input').val());
        if (qtyValue > 1) {
            $('#qty-input').val(qtyValue - 1);
        }
    }

    //Remove Cart Function
    function removeCart(rowId) {
        event.preventDefault();
        if (rowId != '') {
            $.ajax({
                url: '{{ route('frontend.ajaxCartItemRemove') }}',
                method: 'POST',
                dataType: 'json',
                data: {"rowId": rowId, "_token": '{{ csrf_token() }}'},
                success: function (data) {
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg
                    })
                    refreshMiniCart();
                    refreshCart();
                }
            });
        }
    }

    //Refresh cart By ajax
    function refreshMiniCart() {
        $.ajax({
            url: '{{ route('frontend.ajaxCartItemsRefresh') }}',
            method: 'POST',
            dataType: 'json',
            data: {"_token": '{{ csrf_token() }}'},
            success: function (data) {
                $('.basket-item-count .count').text(data.cartCount);
                $('.total-price-basket .total-price .value').text(data.cartTotal);
                $('#basket-cart-subtotal').text(data.cartSubtotal);
                let html = `<div class="cart-item product-summary">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-danger">{{ __('Your Cart is Empty!!') }}</p>
                                                </div>
                                            </div>
                              </div>`;

                if (Object.keys(data.cartContents).length !== 0) {
                    html = '';
                    $.each(data.cartContents, function (index, cartContent) {
                        html += `<div class="cart-item product-summary" style="margin-bottom: 10px">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image"><a href="{{ config('app.url').'/product/' }}${cartContent.options.slug}"><img src="/storage/products/${cartContent.options.image}" alt=""></a></div>
                                            </div>
                                            <div class="col-xs-7">
                                                <h3 class="name"><a href="{{ config('app.url').'/product/' }}${cartContent.options.slug}">${cartContent.name}</a></h3>
                                                <div class="price">${cartContent.price} * ${cartContent.qty}</div>
                                            </div>
                                            <div class="col-xs-1 action"><a href="#" onclick="event.preventDefault(); removeCart('${cartContent.rowId}')"><i class="fa fa-trash"></i></a></div>
                                        </div>
                                    </div>`;
                    })
                }
                $('.cart-items-wrapper').html(html);
            }
        });
    }

    //Ajax Wishlist
    $(document).on('click', '#add-to-wishlist', function () {
        event.preventDefault();
        let product_id = $(this).data('product-id');
        if (product_id != '' || product_id != null) {
            $.ajax({
                url: '{{ route('frontend.ajax.addToWishlist') }}',
                method: 'POST',
                dataType: 'json',
                data: {"product_id": product_id, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg,
                    });
                },
            });
        }
    });

    //Ajax Add To cart
    $(document).on('submit', '#add-to-cart-form', function () {
        event.preventDefault();
        let product_id = $(this).children('#product_id').val();
        let quantity = $(this).find('#qty-input').val();
        if (product_id != '' || product_id != null && quantity != '' || quantity != '') {
            $.ajax({
                url: '{{ route('frontend.ajax.addToCart') }}',
                method: 'POST',
                dataType: 'json',
                data: {"product_id": product_id, "quantity": quantity, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    refreshMiniCart();
                    $('#product_quick_view').modal('hide');
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg,
                    });

                },
            });
        }
    });

</script>
@stack('scripts')
</body>

</html>
