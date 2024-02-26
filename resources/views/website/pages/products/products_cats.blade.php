@extends('website.layouts.master')

@section('content')
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="popup-filter ">
                                                        <div class="collection-view " style="width: 80%">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>

                                                        <div class="product-page-per-view" style="width: 20%">
                                                            <select id="sortBy">
                                                                <option value="default">Default Sorting </option>
                                                                <option value="new">New to Old Products</option>
                                                                <option value="price">Low to High Price</option>
                                                                <option value="discount">High to Low Discount</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @foreach ($products as $product)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box pb-2" style="border: 1px solid #e7e7e7; ">
                                                            <div class="img-wrapper">
                                                                <div class="lable-block">
                                                                    <span class="lable3">{{ $product->condition }}</span>
                                                                </div>
                                                                <div class="front">
                                                                    <a
                                                                        href="{{ route('product.details', $product->slug) }}">
                                                                        <img src="{{ asset('images/Products/' . $product->image) }}"
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
                                                                <div class="rate">
                                                                    {{-- {{ $product->rates }} --}}
                                                                    @if (!empty($product->rates) && count($product->rates) > 0)
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $product->rates[0]->avg_rating)
                                                                                <i class="fa fa-star active"></i>
                                                                            @else
                                                                                <i class="fa fa-star"></i>
                                                                            @endif
                                                                        @endfor
                                                                    @else
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @endif

                                                                </div>
                                                                <a href="{{ route('product.details', $product->slug) }}">
                                                                    <h6>{{ $product->title }}</h6>
                                                                </a>
                                                                <h4>{{ App\Utils\Helper::convertPrice($product->offer_price) }}
                                                                    @if ($product->discount > 0)
                                                                        <del>{{ App\Utils\Helper::convertPrice($product->price) }}</del>
                                                                    @endif
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('#sortBy').change(function() {
            var sort = $('#sortBy').val();
            window.location = "{{ $cat->slug }}?sort=" + sort;
        });
    </script>
@endsection
