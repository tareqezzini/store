@extends('website.layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/price-range.css') }}">
@endsection
@section('content')
    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <form action="{{ route('shop.filter') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-sm-3 collection-filter">
                            <!-- side-bar colleps block stat -->
                            <div class="collection-filter-block">
                                <!-- brand filter start -->
                                <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                            aria-hidden="true"></i> back</span></div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title mb-3">Categories</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            @if ($cats)
                                                @if (!empty($_GET['category']))
                                                    @php
                                                        $slugs = explode(',', $_GET['category']);
                                                    @endphp
                                                @endif
                                                @foreach ($cats as $cat)
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" name="category[]"
                                                            value="{{ $cat->slug }}" id="{{ $cat->title }}"
                                                            onchange="this.form.submit()"
                                                            @if (!empty($slugs) && in_array($cat->slug, $slugs)) checked @endif>
                                                        <label class="form-check-label"
                                                            for="{{ $cat->title }}">{{ $cat->title }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- price filter start here -->
                                <div class="collection-collapse-block border-0 open">
                                    <h3 class="collapse-block-title">price</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="wrapper mt-3">
                                            <div class="range-slider">
                                                <input type="text" class="js-range-slider" name="sortByPrice"
                                                    value="{{ !empty($_GET['sortByPrice']) ? $_GET['sortByPrice'] : '' }}"
                                                    onchange="this.form.submit()" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- silde-bar colleps block end here -->
                            <!-- side-bar single product slider start -->
                            <div class="theme-card">
                                <h5 class="title-border">new product</h5>
                                <div class="offer-slider slide-1">
                                    @php
                                        $chunkedProducts = array_chunk($products_new, 3);
                                    @endphp
                                    @foreach ($chunkedProducts as $chunkedProduct)
                                        <div>
                                            @foreach ($chunkedProduct as $product_new)
                                                <div class="media">
                                                    <a href="{{ route('product.details', $product_new['slug']) }}">
                                                        <img class="img-fluid blur-up lazyload"
                                                            src="{{ asset('images/Products/' . $product_new['image']) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="media-body align-self-center">
                                                        <div class="rating"><i class="fa fa-star"></i> <i
                                                                class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                                class="fa fa-star"></i>
                                                        </div>
                                                        <a href="{{ route('product.details', $product_new['slug']) }}">
                                                            <h6>{{ $product_new['title'] }}</h6>
                                                        </a>
                                                        <h4>
                                                            {{ App\Utils\Helper::convertPrice($product_new['offer_price']) }}
                                                            @if ($product_new['discount'] > 0)
                                                                <del>{{ App\Utils\Helper::convertPrice($product_new['price']) }}</del>
                                                            @endif
                                                        </h4>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <!-- side-bar single product slider end -->
                            {{-- <!-- side-bar banner start here -->
                            <div class="collection-sidebar-banner">
                                <a href="#"><img
                                        src="{{ asset('images/Banners/' . App\Models\Banner::first()->image) }}"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                            <!-- side-bar banner end here --> --}}
                        </div>
                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img
                                                    src="{{ asset('images/Banners/' . App\Models\Banner::where('condition', 'promo')->first()->image) }}"
                                                    class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h4>BIGGEST DEALS ON TOP BRANDS</h4>
                                                <p>The trick to choosing the best wear for yourself is to keep in mind your
                                                    body type, individual style, occasion and also the time of day or
                                                    weather.
                                                    In addition to eye-catching products from top brands, we also offer an
                                                    easy 30-day return and exchange policy, free and fast shipping across
                                                    all pin codes, cash or card on delivery option, deals and discounts,
                                                    among other perks. So, sign up now and shop for westarn wear to your
                                                    heart’s content on Multikart. </p>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span
                                                                class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                    aria-hidden="true"></i> Filter</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>Showing Products 1-24 of 10 Result</h5>
                                                            </div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img src="{{ asset('frontend/assets/images/icon/2.png') }}"
                                                                            alt="" class="product-2-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/icon/3.png') }}"
                                                                            alt="" class="product-3-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/icon/4.png') }}"
                                                                            alt="" class="product-4-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/icon/6.png') }}"
                                                                            alt="" class="product-6-layout-view">
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="product-page-per-view">
                                                                <select name="sortBy" onchange="this.form.submit()">
                                                                    <option value="default" @selected(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'default')>
                                                                        Default </option>
                                                                    <option value="priceHtL" @selected(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceHtL')>
                                                                        Price- High To Low</option>
                                                                    <option value="priceLtH" @selected(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceLtH')>
                                                                        Price - Low To High </option>
                                                                    <option value="discountHtL"
                                                                        @selected(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discountHtL')>Discount- High To Low
                                                                    </option>
                                                                    <option value="discountLtH"
                                                                        @selected(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discountLtH')>Discount - Low To High
                                                                    </option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more">
                                                <div class="row margin-res">
                                                    @if (!empty($products))
                                                        @foreach ($products as $product)
                                                            <div class="col-xl-3 col-6 col-grid-box">
                                                                <div class="product-box pb-2"
                                                                    style="border: 1px solid #e7e7e7 ;">
                                                                    <div class="img-wrapper">
                                                                        <div class="front">
                                                                            <a
                                                                                href="{{ route('product.details', $product->slug) }}"><img
                                                                                    src="{{ asset('images/Products/' . $product->image) }}"
                                                                                    class="img-fluid blur-up lazyload bg-img"
                                                                                    alt=""></a>
                                                                        </div>
                                                                        <div class="cart-info cart-wrap"
                                                                            style="display: flex;
                                                                                justify-content: center;
                                                                                align-items: center;
                                                                                flex-direction: column;">
                                                                            @livewire(
                                                                                'add-to-cart',
                                                                                [
                                                                                    'product_details' => $product,
                                                                                    'button' => '<button type="submit" data-bs-toggle="modal"  data-bs-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button>',
                                                                                ],
                                                                                key($product->id)
                                                                            )

                                                                            @livewire(
                                                                                'add-wishlist',
                                                                                [
                                                                                    'product_details' => $product,
                                                                                    'button' => '<button  type="submit" data-bs-toggle="modal" data-bs-target="#addtowishlist"  aria-hidden="true"  title="Add to Wishlist"><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        class="ti-heart" aria-hidden="true"></i></button>',
                                                                                ],
                                                                                key($product->id)
                                                                            )
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-detail">
                                                                        <div>
                                                                            <div class="rate">
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    @if ($i <= $product->rates->avg('rate'))
                                                                                        <i class="fa fa-star active"></i>
                                                                                    @else
                                                                                        <i class="fa fa-star"></i>
                                                                                    @endif
                                                                                @endfor
                                                                            </div>
                                                                            <a
                                                                                href="{{ route('product.details', $product->slug) }}">
                                                                                <h6>{{ $product->title }}</h6>
                                                                            </a>
                                                                            <p>{{ $product->description }}</p>
                                                                            <h4>{{ App\Utils\Helper::convertPrice($product->offer_price) }}
                                                                                @if ($product->discount > 0)
                                                                                    <del>{{ App\Utils\Helper::convertPrice($product->price) }}</del>
                                                                                @endif
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No Product Fonounded</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="load-more-sec">
                                                <a href="javascript:void(0)" class="loadMore">load more</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- section End -->

    @php
        $maxPrice = 1000;
        $minPrice = 0;
        if (!empty($_GET['sortByPrice'])) {
            $priceRang = explode(';', $_GET['sortByPrice']);
            $minPrice = $priceRang[0];
            $maxPrice = $priceRang[1];
        }

    @endphp
@endsection







@section('js')
    <!-- price range js -->
    <script src="{{ asset('frontend/assets/js/price-range.js') }}"></script>

    <script>
        $(function() {

            var $range = $(".js-range-slider"),
                $inputFrom = $(".js-input-from"),
                $inputTo = $(".js-input-to"),
                instance,
                min = 0,
                max = {{ $max_Price }},
                from = 0,
                to = 0;

            $range.ionRangeSlider({
                type: "double",
                min: min,
                max: max,
                from: {{ $minPrice }},
                to: {{ $maxPrice }},
                prefix: '$',
                onStart: updateInputs,
                onChange: updateInputs,
                step: 100,
                prettify_enabled: true,
                prettify_separator: ".",
                values_separator: " - ",
                force_edges: true


            });

            instance = $range.data("ionRangeSlider");

            function updateInputs(data) {
                from = data.from;
                to = data.to;

                $inputFrom.prop("value", from);
                $inputTo.prop("value", to);
            }

            $inputFrom.on("input", function() {
                var val = $(this).prop("value");

                // validate
                if (val < min) {
                    val = min;
                } else if (val > to) {
                    val = to;
                }

                instance.update({
                    from: val
                });
            });

            $inputTo.on("input", function() {
                var val = $(this).prop("value");

                // validate
                if (val < from) {
                    val = from;
                } else if (val > max) {
                    val = max;
                }

                instance.update({
                    to: val
                });
            });

        });
    </script>
@endsection
