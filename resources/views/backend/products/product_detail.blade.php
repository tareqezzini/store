@extends('backend.layouts.master')
@section('title')
    Details Product
@endsection
@section('css')
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/themify-icons.css') }}">

    <!-- owlcarousel css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/owlcarousel.css') }}">

    <!-- Rating css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/rating.css') }}">
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product
                            <small>TechStor Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Details Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Start-->
    <div class="container-fluid">
        <div class="card">
            <div class="row product-page-main card-body">
                <div class="col-xl-4">
                    <div class="product-slider owl-carousel owl-theme" id="sync1">
                        <div class="item"><img src="{{ asset('images/Products/' . $product->image) }}" alt=""
                                class="blur-up lazyloaded">
                        </div>
                        <div class="item"><img src="{{ asset('images/Produtc/' . $product->image) }}" alt=""
                                class="blur-up lazyloaded">
                        </div>
                        <div class="item"><img src="{{ asset('backend/images/pro3/1.jpg') }}" alt=""
                                class="blur-up lazyloaded">
                        </div>
                        <div class="item"><img src="{{ asset('backend/images/pro3/27.jpg') }}" alt=""
                                class="blur-up lazyloaded">
                        </div>

                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="product-page-details product-right mb-0">
                        <h2>{{ $product->title }}</h2>
                        <hr>
                        <h6 class="product-title">description</h6>
                        <p>{{ $product->description }}</p>
                        <div class="product-price digits mt-2">
                            <h3>${{ $product->offer_price }}<del>${{ $product->price }}</del></h3>
                        </div>

                        <hr>
                        <div class="add-product-form">
                            <h6 class="product-title d-inline-block">brand : </h6>
                            <span>{{ $product->brand->title }}</span>
                        </div>
                        <div class="product-page-details product-right mb-0">
                            <h6 class="product-title d-inline-block">category : </h6>
                            <p class="d-inline-block">{{ $product->category->title }}</p>
                        </div>

                        <div class="add-product-form">
                            <h6 class="product-title d-inline-block">quantity : </h6>
                            <span>{{ $product->stock }}</span>
                        </div>
                        <div class="add-product-form">
                            <h6 class="product-title d-inline-block">vendor : </h6>
                            <span>{{ $product->vendor->full_name }}</span>
                        </div>

                        <hr>
                        <h6 class="product-title">Sales Ends In</h6>
                        <div class="timer">
                            <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span>
                                </span><span>22 <span class="padding-l">:</span>
                                    <span class="timer-cal">Hrs</span>
                                </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span>
                                </span><span>57 <span class="timer-cal">Sec</span></span>
                            </p>
                        </div>
                        <div class="m-t-15">
                            <button class="btn btn-primary m-r-10" type="button">Add To Cart</button>
                            <button class="btn btn-secondary" type="button">Add To Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('js')
    <!-- Touchspin Js-->
    <script src="{{ asset('backend/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('backend/js/touchspin/input-groups.min.js') }}"></script>

    <!-- Rating Js-->
    <script src="{{ asset('backend/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('backend/js/rating/rating-script.js') }}"></script>

    <!-- Owlcarousel js-->
    <script src="{{ asset('backend/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('backend/js/dashboard/product-carousel.js') }}"></script>
@endsection
