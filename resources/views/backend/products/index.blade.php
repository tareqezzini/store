@extends('backend.layouts.master')
@section('title')
    Products
@endsection
@section('css')
    <style>
        .add-product {
            position: fixed;
            right: 38px;
            width: 40px;
            height: 40px;
            background-color: #ff4c3b;
            border: 1px solid #ff4c3b;
            border-radius: 50%;
            font-size: 28px;
            font-weight: bolder;
            z-index: 99999;
            transition: .4s;
        }

        .add-product:hover {
            background-color: white;
        }

        .add-product a {
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Products
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
                        <li class="breadcrumb-item">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="add-product">
            <a href="{{ route('product.create') }}">+</a>
        </div>
        <div class="row products-admin ratio_asos">
            @foreach ($products as $product)
                <div class="col-xl-4 col-lg-6 col-sm-12">
                    <div class="card" style="height: 520px;">
                        <div class="card-body product-box">
                            <div class="img-wrapper" style="height: 360px;">
                                <div class="front">
                                    <a href="javascript:void(0)">
                                        @if ($product->image)
                                            <img src="{{ asset('images/Products/' . $product->image) }}"
                                                class="img-fluid blur-up lazyload bg-img" alt="product-img" width="100%">
                                        @endif
                                    </a>
                                    <div class="product-hover">
                                        <ul>
                                            <li>
                                                <a href="{{ route('product.show', $product->id) }}">
                                                    <i class="fa fa-eye btn p-0" title="Details"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.edit', $product->id) }}">
                                                    <i class="fa fa-edit btn p-0" title="Edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $product->id }}">
                                                    <i class="fa fa-trash btn p-0" title="Delete"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rate">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rates->avg('rate'))
                                            <i class="fa fa-star active"></i>
                                        @else
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <a href="javascript:void(0)">
                                    <h6>{{ $product->title }}</h6>
                                </a>
                                <h4>${{ number_format($product->offer_price, 2) }}
                                    <del>${{ number_format($product->price, 2) }}</del>
                                </h4>
                                <h5 class="m-2">category : <strong>{{ $product->category->title }}</strong> </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.products.delete')
            @endforeach
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
