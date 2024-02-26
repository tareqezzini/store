@extends('website.layouts.master')
@section('css')
    <style>
        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            cursor: pointer;
            font-size: 24px;
        }

        .rating label i {
            color: #ccc;
        }

        .rating input[type="radio"]:checked+label i {
            color: #ffa200;
        }

        .product-rate img {
            border-radius: 50%;
        }

        .product-rate {
            border: 1px solid #e5e5e5;
            padding: 10px;
            display: flex;
            align-items: start;
            gap: 10px;
            border-radius: 5px;
        }

        .product-rate:not(:last-child) {
            margin-bottom: 15px
        }

        .product-rate .comment {
            line-height: 1 !important;
            font-size: 15px !important;
            margin-top: 5px !important;
        }
    </style>
@endsection
@section('content')
    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="product-slick">
                            <div style="border: 1px solid #e7e7e7 "><img
                                    src="{{ asset('images/Products/' . $product_details->image) }}" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                        </div>

                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ $product_details->title }}</h2>
                            <div class="rating-section">
                                <div class="rate">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $mainProductAverageRate)
                                            <i class="fa fa-star active"></i>
                                        @else
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor

                                </div>
                                <h6><span>{{ number_format($mainProductAverageRate, 1) }}</span>/{{ $mainProductTotalRates }}
                                    ratings</h6>
                            </div>
                            <div class="label-section">
                                <span class="badge badge-grey-color">{{ $product_details->category->title }}</span>
                            </div>
                            <h3 class="price-detail">{{ App\Utils\Helper::convertPrice($product_details->offer_price) }}
                                <del>{{ App\Utils\Helper::convertPrice($product_details->price) }}</del>
                                <span>{{ $product_details->discount }}% off</span>
                            </h3>


                            <div class="border-product">
                                <h6 class="product-title">summary</h6>
                                <p>{{ $product_details->summary }}</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">shipping info</h6>
                                <ul class="shipping-info">
                                    <li>100% Original Products</li>
                                    <li>Free Delivery on order above Rs. 799</li>
                                    <li>Pay on delivery is available</li>
                                    <li>Easy 30 days returns and exchanges</li>
                                </ul>
                            </div>

                            <div class="product-buttons">

                                @livewire(
                                    'add-to-cart',
                                    [
                                        'product_details' => $product_details,
                                        'button' => '<button type="submit" data-bs-toggle="modal" data-bs-target="#addtocart" class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            aria-hidden="true"></i> add to cart</button>',
                                    ],
                                    key($product_details->id)
                                )

                                @livewire(
                                    'add-wishlist',
                                    [
                                        'product_details' => $product_details,
                                        'button' => '<button type="submit" class="btn btn-solid hover-solid btn-animation" data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to wishlist"><i class="fa fa-bookmark fz-16 me-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            aria-hidden="true"></i>wishlist</button>',
                                    ],
                                    key($product_details->id)
                                )


                            </div>
                            <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend/assets/images/icon/truck.png') }}" class="img-fluid"
                                            alt="image">
                                        <span class="lang">Free shipping for orders above $500 USD</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="review-top-tab" data-bs-toggle="tab"
                                href="#top-review" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>Write
                                Review</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link " id="top-home-tab" data-bs-toggle="tab" href="#top-home"
                                role="tab" aria-selected="true"><i class="icofont icofont-ui-home"></i>Details</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material col-sm-12 col-md-12 col-lg-12 pb-3" id="top-tabContent">
                        <div class="tab-pane fade " id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <div class="product-tab-discription">
                                <div class="part">
                                    <p>{{ $product_details->description }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="top-review" role="tabpanel"
                            aria-labelledby="review-top-tab">
                            <form class="theme-form" method="POST"
                                action="{{ route('product.rate', $product_details->id) }}">
                                @csrf
                                @method('post')
                                <div class="form-row row">
                                    <div class="col-md-12 col-lg-7">
                                        <div class="col-md-12">
                                            <label>Rating</label>
                                            <div class="media">
                                                <div class="rating">
                                                    <input type="radio" name="rate" id="star1" value="1">
                                                    <label for="star1"><i class="fa fa-star"
                                                            aria-hidden="true"></i></label>
                                                    <input type="radio" name="rate" id="star2" value="2">
                                                    <label for="star2"><i class="fa fa-star"
                                                            aria-hidden="true"></i></label>
                                                    <input type="radio" name="rate" id="star3" value="3">
                                                    <label for="star3"><i class="fa fa-star"
                                                            aria-hidden="true"></i></label>
                                                    <input type="radio" name="rate" id="star4" value="4">
                                                    <label for="star4"><i class="fa fa-star"
                                                            aria-hidden="true"></i></label>
                                                    <input type="radio" name="rate" id="star5" value="5">
                                                    <label for="star5"><i class="fa fa-star"
                                                            aria-hidden="true"></i></label>
                                                </div>
                                            </div>
                                            @error('rate')
                                                <span class="text-danger mb-3">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product_details->id }}">
                                        <div class="col-md-10">
                                            <label for="review">Review Title</label>
                                            <textarea class="form-control" placeholder="Wrire Your Testimonial Here" name="comment" id="comment"
                                                rows="6"></textarea>
                                            @error('comment')
                                                <span class=" text-danger mb-3">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-solid" type="submit">Submit YOur
                                                Review</button>
                                        </div>
                                    </div>
                                    @if (!empty($mainProductRates))
                                        <div class="col-md-12 col-lg-5 ">
                                            <h3 class="mb-3">Latest Review</h3>
                                            @foreach ($mainProductRates as $rate)
                                                <div class="col-md-12 product-rate ">
                                                    <div>
                                                        @if (file_exists(public_path('images/Users/' . $rate->user->image)) && $rate->user->image)
                                                            <img src="{{ asset('images/Users/' . $rate->user->image) }}"
                                                                alt="" width="80" height="80">
                                                        @else
                                                            <img src="{{ asset('images/users/default.png') }}"
                                                                alt="" width="80" height="80">
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h4 class="m-0">{{ $rate->user->user_name }}</h4>
                                                        <p class="mb-2comment">{{ $rate->comment }}</p>
                                                        <div class="rate">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($i < $rate->rate)
                                                                    <i class="fa fa-star active" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                @endif
                                                            @endfor

                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                    @endif


                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- product-tab ends -->

    <!-- product section start -->
    @if (count($product_details->related_products))
        <section class="section-b-space ratio_asos">
            <div class="container">
                <div class="row">
                    <div class="col-12 product-related">
                        <h2>related products</h2>
                    </div>
                </div>
                <div class="row search-product">
                    @foreach ($product_details->related_products as $related_product)
                        @if ($related_product->id != $product_details->id)
                            <div class="col-xl-2 col-md-4 col-6">
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front" style="border: 1px solid #e7e7e7 ">
                                            <a href="{{ route('product.details', $related_product->slug) }}"><img
                                                    src="{{ asset('images/Products/' . $related_product->image) }}"
                                                    class="img-fluid blur-up lazyload bg-img"
                                                    alt="{{ $related_product->title }}"></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                                href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rate">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $averageRatesForRelatedProducts[$related_product->id])
                                                    <i class="fa fa-star active"></i>
                                                @else
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <a href="{{ route('product.details', $related_product->slug) }}">
                                            <h6>{{ $related_product->title }}</h6>
                                        </a>
                                        <h4>
                                            {{ App\Utils\Helper::convertPrice($related_product->offer_price) }}
                                            @if ($related_product->discount > 0)
                                                <del>{{ App\Utils\Helper::convertPrice($related_product->price) }}</del>
                                            @endif
                                        </h4>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <!-- product section end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').on('change', function() {
                // Get the value of the selected star
                let selectedValue = $(this).val();

                // Loop through all stars and set their color
                $('input[type="radio"]').each(function() {
                    if ($(this).val() <= selectedValue) {
                        $(this).next('label').find('i').css('color', '#ffa200');
                    } else {
                        $(this).next('label').find('i').css('color', '#ccc');
                    }
                });
            });
        });
    </script>
@endsection
