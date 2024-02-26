@extends('website.layouts.master')
@section('content')
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form method="POST" action="{{ route('checkout.store') }}">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                @php
                                    $name = explode(' ', $user->full_name);
                                @endphp
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">First Name</div>
                                        <input type="text" name="first_name" value="{{ $name[0] }}"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Last Name</div>
                                        <input type="text" name="last_name" value="{{ $name[1] }}"
                                            placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone" value="{{ $user->phone }}"
                                            placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email</div>
                                        <input type="text" name="email" value="{{ $user->email }}"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address</div>
                                        <input type="text" name="address" value="{{ $user->address }}"
                                            placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Country</div>
                                        <input type="text" name="country" value="{{ $user->country }}"
                                            placeholder="Country">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Town/City</div>
                                        <input type="text" name="city" value="{{ $user->city }}" placeholder="city">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">State</div>
                                        <input type="text" name="state" value="{{ $user->state }}"
                                            placeholder="State">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Postal Code</div>
                                        <input type="text" name="code_postal" value="{{ $user->code_postal }}"
                                            placeholder="Code Postal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                            @foreach ($cartItems as $cartItem)
                                                <li>{{ $cartItem['name'] }} × {{ $cartItem['quantity'] }}
                                                    <span>${{ number_format($cartItem['price'], 2) }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="sub-total">
                                            @php
                                                $subtotal = 0; // Initialize the subtotal variable
                                            @endphp
                                            @foreach ($cartItems as $item)
                                                @php
                                                    $subtotal += $item['total'];
                                                @endphp
                                            @endforeach
                                            <li>Total <span class="count">$
                                                    {{ number_format($subtotal, 3) }}
                                                </span></li>

                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>

                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" value="cash on delivery"
                                                                name="payment_method" id="payment-2" checked>
                                                            <label for="payment-2">Cash On Delivery</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" value="PayPal" name="payment_method"
                                                                id="payment-3">
                                                            <label for="payment-3">PayPal<span class="image"><img
                                                                        src="{{ asset('frontend/assets/images/paypal.png') }}"
                                                                        alt=""></span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn-solid btn">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection
