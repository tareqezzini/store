@extends('website.layouts.master')

@section('content')
    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">availability</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items = \Cart::session('wishlist')->getContent() as $product)
                                <tr>
                                    <td>
                                        <a href="#"><img
                                                src="{{ asset('images/Products/' . $product->attributes->image) }}"
                                                alt=""></a>
                                    </td>
                                    <td><a
                                            href="{{ route('product.details', $product->attributes->slug) }}">{{ $product->name }}</a>
                                        <div class="mobile-cart-content row">
                                            <div class="col">
                                                <p>{{ $product->attributes->stock > 0 ? 'in stock' : 'not in stock' }}</p>
                                            </div>
                                            <div class="col">
                                                <h2 class="td-color">{{ $product->price }}</h2>
                                            </div>
                                            <div class="col">
                                                <h2 class="td-color">
                                                    <form method="POST"
                                                        action="{{ route('wishlist.delete', $product->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="border-0 bg-white"><i class="ti-close"></i></button>
                                                    </form>
                                                    @livewire('add-to-cart', ['product_details' => $product, 'button' => '<button class="border-0 bg-white"><i class="ti-shopping-cart"></i></button>'], key($product->id))

                                                    {{-- <a href="#" class="icon me-1"><i class="ti-close"></i></a> --}}
                                                    {{-- <a href="#" class="cart"><i class="ti-shopping-cart"></i></a> --}}
                                                </h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>{{ $product->price }}</h2>
                                    </td>
                                    <td>
                                        <p>{{ $product->attributes->stock > 0 ? 'in stock' : 'not in stock' }}</p>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('wishlist.delete', $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="border-0 bg-white"><i class="ti-close"></i></button>
                                        </form>

                                        {{-- <a href="#" class="icon me-1"><i class="ti-close"></i></a> --}}
                                        {{-- <a href="#" class="cart"><i class="ti-shopping-cart"></i></a> --}}
                                        @livewire('add-to-cart', ['product_details' => $product, 'button' => '<button class="border-0 bg-white"><i class="ti-shopping-cart"></i></button>'], key($product->id))
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12">
                    <a href="/" class="btn btn-solid">continue shopping</a>
                    {{-- <a href="#" class="btn btn-solid">check out</a> --}}
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
@endsection
