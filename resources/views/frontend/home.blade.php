@extends('frontend.layouts.app')

@section('title') {{ __('Home') }} @endsection

@section('sidebar')
    <div class="col-xs-12 col-sm-12 col-md-3 order-2 order-md-2 order-sm-2 order-lg-1 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
                <ul class="nav">
                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-shopping-bag" aria-hidden="true"></i>Clothing</a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Shoes </a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Sunglasses</a></li>
                                            <li><a href="#">Sport Wear</a></li>
                                            <li><a href="#">Blazers</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Handbags</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Swimwear </a></li>
                                            <li><a href="#">Tops</a></li>
                                            <li><a href="#">Flats</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Winter Wear</a></li>
                                            <li><a href="#">Night Suits</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Toys &amp; Games</a></li>
                                            <li><a href="#">Jeans</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">School Bags</a></li>
                                            <li><a href="#">Lunch Box</a></li>
                                            <li><a href="#">Footwear</a></li>
                                            <li><a href="#">Wipes</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Sandals </a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Night Dress</a></li>
                                            <li><a href="#">Swim Wear</a></li>
                                            <li><a href="#">Toys</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a>
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Gaming</a></li>
                                            <li><a href="#">Laptop Skins</a></li>
                                            <li><a href="#">Apple</a></li>
                                            <li><a href="#">Dell</a></li>
                                            <li><a href="#">Lenovo</a></li>
                                            <li><a href="#">Microsoft</a></li>
                                            <li><a href="#">Asus</a></li>
                                            <li><a href="#">Adapters</a></li>
                                            <li><a href="#">Batteries</a></li>
                                            <li><a href="#">Cooling Pads</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Routers &amp; Modems</a></li>
                                            <li><a href="#">CPUs, Processors</a></li>
                                            <li><a href="#">PC Gaming Store</a></li>
                                            <li><a href="#">Graphics Cards</a></li>
                                            <li><a href="#">Components</a></li>
                                            <li><a href="#">Webcam</a></li>
                                            <li><a href="#">Memory (RAM)</a></li>
                                            <li><a href="#">Motherboards</a></li>
                                            <li><a href="#">Keyboards</a></li>
                                            <li><a href="#">Headphones</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-banner-holder"><a href="#"><img alt=""
                                                                                         src="assets/images/banners/banner-side.png"/></a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu -->
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-paw" aria-hidden="true"></i>Shoes</a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Shoes </a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Sunglasses</a></li>
                                            <li><a href="#">Sport Wear</a></li>
                                            <li><a href="#">Blazers</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Handbags</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Swimwear </a></li>
                                            <li><a href="#">Tops</a></li>
                                            <li><a href="#">Flats</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Winter Wear</a></li>
                                            <li><a href="#">Night Suits</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Toys &amp; Games</a></li>
                                            <li><a href="#">Jeans</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">School Bags</a></li>
                                            <li><a href="#">Lunch Box</a></li>
                                            <li><a href="#">Footwear</a></li>
                                            <li><a href="#">Wipes</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Sandals </a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Night Dress</a></li>
                                            <li><a href="#">Swim Wear</a></li>
                                            <li><a href="#">Toys</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-clock-o"></i>Watches</a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Gaming</a></li>
                                            <li><a href="#">Laptop Skins</a></li>
                                            <li><a href="#">Apple</a></li>
                                            <li><a href="#">Dell</a></li>
                                            <li><a href="#">Lenovo</a></li>
                                            <li><a href="#">Microsoft</a></li>
                                            <li><a href="#">Asus</a></li>
                                            <li><a href="#">Adapters</a></li>
                                            <li><a href="#">Batteries</a></li>
                                            <li><a href="#">Cooling Pads</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Routers &amp; Modems</a></li>
                                            <li><a href="#">CPUs, Processors</a></li>
                                            <li><a href="#">PC Gaming Store</a></li>
                                            <li><a href="#">Graphics Cards</a></li>
                                            <li><a href="#">Components</a></li>
                                            <li><a href="#">Webcam</a></li>
                                            <li><a href="#">Memory (RAM)</a></li>
                                            <li><a href="#">Motherboards</a></li>
                                            <li><a href="#">Keyboards</a></li>
                                            <li><a href="#">Headphones</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-banner-holder"><a href="#"><img alt=""
                                                                                         src="assets/images/banners/banner-side.png"/></a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-diamond"></i>Jewellery</a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Shoes </a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Sunglasses</a></li>
                                            <li><a href="#">Sport Wear</a></li>
                                            <li><a href="#">Blazers</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Handbags</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Swimwear </a></li>
                                            <li><a href="#">Tops</a></li>
                                            <li><a href="#">Flats</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Winter Wear</a></li>
                                            <li><a href="#">Night Suits</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Toys &amp; Games</a></li>
                                            <li><a href="#">Jeans</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">School Bags</a></li>
                                            <li><a href="#">Lunch Box</a></li>
                                            <li><a href="#">Footwear</a></li>
                                            <li><a href="#">Wipes</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li><a href="#">Sandals </a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Jwellery</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Night Dress</a></li>
                                            <li><a href="#">Swim Wear</a></li>
                                            <li><a href="#">Toys</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Gaming</a></li>
                                            <li><a href="#">Laptop Skins</a></li>
                                            <li><a href="#">Apple</a></li>
                                            <li><a href="#">Dell</a></li>
                                            <li><a href="#">Lenovo</a></li>
                                            <li><a href="#">Microsoft</a></li>
                                            <li><a href="#">Asus</a></li>
                                            <li><a href="#">Adapters</a></li>
                                            <li><a href="#">Batteries</a></li>
                                            <li><a href="#">Cooling Pads</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <li><a href="#">Routers &amp; Modems</a></li>
                                            <li><a href="#">CPUs, Processors</a></li>
                                            <li><a href="#">PC Gaming Store</a></li>
                                            <li><a href="#">Graphics Cards</a></li>
                                            <li><a href="#">Components</a></li>
                                            <li><a href="#">Webcam</a></li>
                                            <li><a href="#">Memory (RAM)</a></li>
                                            <li><a href="#">Motherboards</a></li>
                                            <li><a href="#">Keyboards</a></li>
                                            <li><a href="#">Headphones</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-banner-holder"><a href="#"><img alt=""
                                                                                         src="assets/images/banners/banner-side.png"/></a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-futbol-o"></i>Sports</a>
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                        <!-- /.dropdown-menu -->
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    </li>
                    <!-- /.menu-item -->

                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon fa fa-envira"></i>Home and Garden</a>
                        <!-- /.dropdown-menu --> </li>
                    <!-- /.menu-item -->

                </ul>
                <!-- /.nav -->
            </nav>
            <!-- /.megamenu-horizontal -->
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                @forelse($hotDealProducts as $key => $hotDealProduct)
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image"><img
                                        src="{{ $hotDealProduct->image ? asset('storage/products/'.$hotDealProduct->image):placeholderImage($hotDealProduct->title) }}"
                                        alt="{{ $hotDealProduct->title ?? '' }}"></div>
                                <div class="sale-offer-tag"><span>{{ percentageCalculate($hotDealProduct->meta->regular_price,$hotDealProduct->meta->sale_price).'%' }}<br>
                    off</span></div>
                                <div class="countdown show"
                                     data-Date='{{ \Carbon\Carbon::parse($hotDealProduct->meta->sale_end)->format('Y/m/d h:i:s') }}'>
                                    <div class="running">
                                        <timer>
                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box"><span class="key days">120</span> <span
                                                            class="value">DAYS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="hour box"><span class="key hours">20</span> <span
                                                            class="value">HRS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="minute box"><span class="key minutes">36</span> <span
                                                            class="value">MINS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper hidden-md">
                                                    <div class="second box"><span class="key seconds">60</span> <span
                                                            class="value">SEC</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </timer>
                                    </div>
                                </div>
                            </div>
                            <!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a
                                        href="{{ route('frontend.product.details',$hotDealProduct->slug) }}">{{ $hotDealProduct->title ?? __('Product title') }}</a>
                                </h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price"><span
                                        class="price"> ${{ $hotDealProduct->meta->sale_price ?? 00.00 }} </span> <span
                                        class="price-before-discount">${{ $hotDealProduct->meta->regular_price ?? 00.00 }}</span>
                                </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                class="fa fa-shopping-cart"></i></button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </div>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                    </div>
                @empty
                    <div class="item">
                        <h5>{{ __('Sorry, Featured products not found!!' ) }}</h5>
                    </div>
                @endforelse

            </div>
            <!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    @forelse($specialOfferProducts as $key => $specialOfferProduct)
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a
                                                            href="{{ route('frontend.product.details',$specialOfferProduct->slug) }}">
                                                            <img
                                                                src="{{ $specialOfferProduct->image ? asset('storage/products/'.$specialOfferProduct->image) : placeholderImage($specialOfferProduct->title) }}"
                                                                alt="{{ $specialOfferProduct->title ?? __('Product Image') }}">
                                                        </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a
                                                            href="{{ route('frontend.product.details',$specialOfferProduct->slug) }}">{{ $specialOfferProduct->title ?? __('Product Title') }}</a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        @if($specialOfferProduct->meta->sale_price)
                                                            <span
                                                                class="price"> ${{ $specialOfferProduct->meta->sale_price ?? '0.00' }}  </span>
                                                            <span
                                                                class="price-before-discount">${{ $specialOfferProduct->meta->regular_price ?? '0.00' }} </span>
                                                        @else
                                                            <span
                                                                class="price"> ${{ $specialOfferProduct->meta->regular_price ?? '0.00' }} </span>
                                                        @endif</div>
                                                    <!-- /.product-price -->
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="assets/images/products/p29.jpg" alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="assets/images/products/p28.jpg" alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item">
                            <h5>{{ __('Sorry, Featured products not found!!' ) }}</h5>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"><a class="item" title="Phone" href="category.html">Phone</a> <a
                        class="item active" title="Vest" href="category.html">Vest</a> <a class="item"
                                                                                          title="Smartphone"
                                                                                          href="category.html">Smartphone</a>
                    <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt"
                                                                                            href="category.html">T-shirt</a>
                    <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item"
                                                                                              title="Sneaker"
                                                                                              href="category.html">Sneaker</a>
                    <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose"
                                                                                  href="category.html">Rose</a></div>
                <!-- /.tag-list -->
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Deals</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products special-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p28.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p15.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p26.jpg" alt="image"> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products special-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p18.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p17.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p16.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products special-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p15.jpg" alt="images">
                                                        <div class="zoom-overlay"></div>
                                                    </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p14.jpg" alt="">
                                                        <div class="zoom-overlay"></div>
                                                    </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p13.jpg" alt="image"> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
                @if(session()->has('newsletterMsg'))
                    <div class="alert alert-success">
                        {{ session()->get('newsletterMsg') }}
                    </div>
                @endif
                <p>Sign Up for Our Newsletter!</p>
                <form action="{{ route('frontend.newsletters.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                        <input type="email" name="newsletter_email" class="form-control" id="exampleInputEmail1"
                               placeholder="Subscribe to our newsletter">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
                <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">John Doe <span>Abc Company</span></div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
        </div>

        <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner"><img src="assets/images/banners/LHS-banner.jpg" alt="Image"></div>
    </div>
@endsection

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-9 order-1 order-md-1 order-sm-1 order-lg-2 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach($heroSliders as $heroSlider)
                    <div class="item"
                         style="background-image: url({{ asset('storage/sliders/home/'.$heroSlider->image) }});">
                        <div class="container-fluid" style="background: #fff">
                            <div class="caption bg-color vertical-center text-left">
                                <div
                                    class="slider-header fadeInDown-1">{{ $heroSlider->sub_title ?? __('Sub Title') }}</div>
                                <div
                                    class="big-text fadeInDown-1 text-light">{{ $heroSlider->title ?? __('Title Here') }}</div>
                                <div class="excerpt fadeInDown-2 hidden-xs">
                                    <span
                                        class="text-white">{{ $heroSlider->description ?? __('Here will be the slider Description') }}</span>
                                </div>
                                <div class="button-holder fadeInDown-3"><a href="{{ $heroSlider->btn_link ?? __('#') }}"
                                                                           class="btn-lg btn btn-uppercase btn-primary shop-now-button"> {{ $heroSlider->btn_text ?? __('Shop Now') }}</a>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->
                @endforeach
                <div class="item" style="background-image: url(assets/images/sliders/02.jpg);">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="slider-header fadeInDown-1">Spring 2016</div>
                            <div class="big-text fadeInDown-1"> Women <span class="highlight">Fashion</span></div>
                            <div class="excerpt fadeInDown-2 hidden-xs"><span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span>
                            </div>
                            <div class="button-holder fadeInDown-3"><a href="index.php?page=single-product"
                                                                       class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                    Now</a></div>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">money back</h4>
                                </div>
                            </div>
                            <h6 class="text">30 Days Money Back Guarantee</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">free shipping</h4>
                                </div>
                            </div>
                            <h6 class="text">Shipping on orders over $99</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text">Extra $5 off on all items </h6>
                        </div>
                    </div>
                    <!-- .col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">New Products</h3>
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                    <li class="active d-inline-block"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
                    </li>
                    @foreach($catTabs as $key => $catTab)
                        <li id="npt-menu" class="d-inline-block" data-cat-id="{{ $catTab->id }}"><a
                                data-transition-type="backSlide" href="#category-{{ $catTab->id }}"
                                data-toggle="tab">{{ $catTab->name ?? __('Default') }}</a></li>
                    @endforeach
                </ul>
                <!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            @forelse($products as $key => $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"><a
                                                        href="{{ route('frontend.product.details',$product->slug) }}"><img
                                                            src="{{ $product->image ? asset('storage/products/'.$product->image) : placeholderImage($product->name) }}"
                                                            alt=""></a></div>
                                                <!-- /.image -->

                                                @if($product->meta->sale_price)
                                                    <div class="tag sale"><span>Sale</span></div>
                                                @else
                                                    <div class="tag new"><span>new</span></div>
                                                @endif
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ route('frontend.product.details',$product->slug) }}">{{ $product->title ?? __('Product Title')  }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price">
                                                    @if($product->meta->sale_price)
                                                        <span
                                                            class="price"> ${{ $product->meta->sale_price ?? '0.00' }}  </span>
                                                        <span
                                                            class="price-before-discount">${{ $product->meta->regular_price ?? '0.00' }} </span>
                                                    @else
                                                        <span
                                                            class="price"> ${{ $product->meta->regular_price ?? '0.00' }} </span>
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <a href="" id="add_to_cart" data-product-id="{{ $product->id }}" data-toggle="modal" data-target="#product_quick_view" class="btn btn-primary icon" type="button" title="Add Cart"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart </button>
                                                        </li>
                                                        <li class="lnk wishlist">
                                                            <a href="#" id="add-to-wishlist" data-product-id="{{ $product->id }}" class="add-to-cart" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                        </li>

                                                        <li class="lnk"><a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div>
                            @empty
                                <div class="item item-carousel">
                                    <h5>{{ __('Sorry, No Product Found!!') }}</h5>
                                </div>
                        @endforelse
                        <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.tab-pane -->
                @foreach($catTabs as $key => $catProducts)
                    <div class="tab-pane" id="category-{{ $catProducts->id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                @forelse($catProducts->products as $key => $catProduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"><a
                                                            href="{{ route('frontend.product.details',$catProduct->slug) }}"><img
                                                                src="{{ $catProduct->image ? asset('storage/products/'.$catProduct->image) : placeholderImage($catProduct->name) }}"
                                                                alt=""></a></div>
                                                    <!-- /.image -->

                                                    @if($catProduct->meta->sale_price)
                                                        <div class="tag sale"><span>Sale</span></div>
                                                    @else
                                                        <div class="tag new"><span>new</span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ route('frontend.product.details',$catProduct->slug) }}">{{ $catProduct->title ?? __('Product Title')  }}</a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        @if($catProduct->meta->sale_price)
                                                            <span
                                                                class="price"> ${{ $catProduct->meta->sale_price ?? '0.00' }}  </span>
                                                            <span
                                                                class="price-before-discount">${{ $catProduct->meta->regular_price ?? '0.00' }} </span>
                                                        @else
                                                            <span
                                                                class="price"> ${{ $catProduct->meta->regular_price ?? '0.00' }} </span>
                                                        @endif
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <a href="" id="add_to_cart" data-product-id="{{ $catProduct->id }}" data-toggle="modal" data-target="#product_quick_view" class="btn btn-primary icon" type="button" title="Add Cart"><i
                                                                        class="fa fa-shopping-cart"></i></a>
                                                                <button class="btn btn-primary cart-btn" type="button">
                                                                    Add
                                                                    to
                                                                    cart
                                                                </button>
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a href="#" id="add-to-wishlist" data-product-id="{{ $catProduct->id }}" class="add-to-cart" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                            </li>
                                                            <li class="lnk"><a data-toggle="tooltip" class="add-to-cart"
                                                                               href="detail.html" title="Compare"> <i
                                                                        class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @empty
                                    <div class="item item-carousel">
                                        <h5>{{ __('Sorry, No Product Found!!') }}</h5>
                                    </div>
                                @endforelse
                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
            @endforeach
            <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="wide-banner cnt-strip">
                        <div class="image"><img class="img-responsive"
                                                src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}"
                                                alt=""></div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
                <div class="col-md-5 col-sm-5">
                    <div class="wide-banner cnt-strip">
                        <div class="image"><img class="img-responsive"
                                                src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}"
                                                alt=""></div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                @forelse($featuredProducts as $key => $featuredProduct)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a
                                            href="{{ route('frontend.product.details',$featuredProduct->slug) }}"><img
                                                src="{{ $featuredProduct->image ? asset('storage/products/'.$featuredProduct->image) : placeholderImage($featuredProduct->name) }}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    @if($featuredProduct->meta->sale_price)
                                        <div class="tag sale"><span>Sale</span></div>
                                    @else
                                        <div class="tag new"><span>new</span></div>
                                    @endif
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a
                                            href="{{ route('frontend.product.details',$featuredProduct->slug) }}">{{ $featuredProduct->title ?? __('Product Title')  }}</a>
                                    </h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price">
                                        @if($featuredProduct->meta->sale_price)
                                            <span
                                                class="price"> ${{ $featuredProduct->meta->sale_price ?? '0.00' }}  </span>
                                            <span
                                                class="price-before-discount">${{ $featuredProduct->meta->regular_price ?? '0.00' }} </span>
                                        @else
                                            <span
                                                class="price"> ${{ $featuredProduct->meta->regular_price ?? '0.00' }} </span>
                                        @endif
                                    </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="" id="add_to_cart" data-product-id="{{ $featuredProduct->id }}" data-toggle="modal" data-target="#product_quick_view" class="btn btn-primary icon" type="button" title="Add Cart"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button class="btn btn-primary cart-btn" type="button">Add
                                                    to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a href="#" id="add-to-wishlist" data-product-id="{{ $featuredProduct->id }}" class="add-to-cart" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk"><a data-toggle="tooltip" class="add-to-cart"
                                                               href="detail.html" title="Compare"> <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                @empty
                    <div class="item item-carousel">
                        <h5>{{ __('Sorry, Featured products not found!!' ) }}</h5>
                    </div>
            @endforelse
            <!-- /.item -->
            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-12">
                    <div class="wide-banner cnt-strip">
                        <div class="image"><img class="img-responsive"
                                                src="{{ __('frontend/assets/images/banners/home-banner.jpg') }}"
                                                alt=""></div>
                        <div class="strip strip-text">
                            <div class="strip-inner">
                                <h2 class="text-right">New Mens Fashion<br>
                                    <span class="shopping-needs">Save up to 40% off</span></h2>
                            </div>
                        </div>
                        <div class="new-label">
                            <div class="text">NEW</div>
                        </div>
                        <!-- /.new-label -->
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p20.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p21.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p22.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p23.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p24.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p25.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p26.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"><a href="#"> <img
                                                            src="assets/images/products/p27.jpg" alt=""> </a></div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"><span class="price"> $450.99 </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">
                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"><a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                                                            alt=""></a></div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                                <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a></div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"><a href="blog.html"><img src="assets/images/blog-post/post2.jpg"
                                                                            alt=""></a></div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a></div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->

                    <!-- /.item -->

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"><a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                                                            alt=""></a></div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a></div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"><a href="blog.html"><img src="assets/images/blog-post/post2.jpg"
                                                                            alt=""></a></div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a></div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"><a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                                                            alt=""></a></div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a></div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->

                </div>
                <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p19.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p28.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p30.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p1.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p2.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="detail.html"><img src="assets/images/products/p3.jpg"
                                                                              alt=""></a></div>
                                <!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"><span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span></div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                            </a></li>
                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                    class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->
            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    </div>
@endsection

@section('brands')
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}"
                            alt=""> </a>
                </div>
                <!--/.item-->

                <div class="item m-t-10"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand2.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}"
                            alt=""> </a>
                </div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand3.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand6.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand2.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->

                <div class="item"><a href="#" class="image"> <img
                            data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                            src="{{ asset('assets/images/blank.gif') }}" alt="">
                    </a></div>
                <!--/.item-->
            </div>
            <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->

    </div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/assets/js/multi-countdown.js') }}"></script>
@endpush

