@extends('frontend.layouts.app')

@section('title') {{ __('Wishlists') }} @endsection

@section('content')
    <div class="col-lg-12">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4" class="heading-title">{{ __('My Wishlist') }}</th>
                            </tr>
                            </thead>
                            <tbody id="wishlist-wrapper">
                            @forelse($wishlists as $key => $wishlist)
                                <tr>
                                    <td class="col-md-2"><img
                                            src="{{ $wishlist->products->image ? asset('storage/products/'.$wishlist->products->image) : placeholderImage($wishlist->products->title) }}"
                                            alt="{{ $wishlist->products->title ?? '' }}"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a
                                                href="{{ $wishlist->products->slug ? route('frontend.product.details',$wishlist->products->slug) : '#' }}">{{ $wishlist->products->title ?? __('Product Title') }}</a>
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                        <div class="price">
                                            @if($wishlist->products->meta->sale_price)
                                                ${{ $wishlist->products->meta->sale_price ?? 00.00 }}
                                                <span>${{ $wishlist->products->meta->regular_price ?? 00.00 }}</span>
                                            @else
                                                ${{ $wishlist->products->meta->regular_price ?? 00.00 }}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <form action="{{ route('frontend.addToCart') }}" method="post" id="add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id"
                                                   value="{{ $wishlist->products->id }}">
                                            <input type="hidden" name="quantity" id="qty-input" value="1">
                                            <button type="submit" class="btn-upper btn btn-primary">Add to cart</button>
                                        </form>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a id="remove-wishlist-item" data-wishlist-id="{{ $wishlist->products->id }}"
                                           href="#"
                                           class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4"
                                        class="heading-title">{{ __('You have not added any product on your wishlists.') }}</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '#remove-wishlist-item', function () {
            event.preventDefault();
            let wishlist_id = $(this).data('wishlist-id');
            $.ajax({
                url: '{{ route('frontend.ajax.removeWishlistItem') }}',
                method: 'POST',
                dataType: 'json',
                data: {"wishlist_id": wishlist_id, "_token": '{{ csrf_token() }}'},
                success: function (data) {
                    toast.fire({
                        type: data.type,
                        icon: data.type,
                        title: data.msg,
                    });
                    refreshWishlist();
                }
            })
        });

        //Refresh Wishlist Page
        function refreshWishlist() {
            $.ajax({
                url: '{{ route('frontend.ajax.ajaxWishlistShow') }}',
                method: 'POST',
                dataType: 'json',
                data: {"_token": '{{ csrf_token() }}'},
                success: function (data) {
                    let html = '';
                    $.each(data, function (index, value) {
                        let price = '$' + value.meta.regular_price;
                        if (value.meta.sale_price) {
                            price = '$' + value.meta.sale_price + '<span>$' + value.meta.regular_price + '</span>';
                        }
                        html += `<tr>
                                <td class="col-md-2"><img src="/storage/products/${value.image}" alt="${value.title}"></td>
                                <td class="col-md-7">
                                    <div class="product-name"><a href="{{ config('app.url').'/product/' }}${value.slug}">${value.title}</a></div>
                                    <div class="rating">
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star non-rate"></i>
                                        <span class="review">( 06 Reviews )</span>
                                    </div>
                                    <div class="price">
                                        ${price}
                                     </div>
                                </td>
                                <td class="col-md-2">
                                    <form action="{{ route('frontend.addToCart') }}" method="post" id="add-to-cart-form">
                                            @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="${value.id}">
                                            <input type="hidden" name="quantity" id="qty-input" value="1">
                                            <button type="submit" class="btn-upper btn btn-primary">Add to cart</button>
                                        </form>
                                </td>
                                <td class="col-md-1 close-btn">
                                    <a id="remove-wishlist-item" data-wishlist-id="${value.id}" href="#" class=""><i class="fa fa-times"></i></a>
                                </td>
                                </tr>`;
                    });
                    $('#wishlist-wrapper').html(html);
                },
            });
        }
    </script>
@endpush
