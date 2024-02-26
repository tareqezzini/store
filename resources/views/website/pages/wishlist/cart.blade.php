@extends('website.layouts.master')
@section('content')
    <!--section start-->
    <section class="cart-section section-b-space">

        @livewire('shopping-cart', ['cars' => Cart::session('cart')->getContent()])
    </section>
    <!--section end-->
@endsection
