@extends('backend.layouts.master')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bg-inner cart-section order-details-table">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="card-details-title">
                                        <h3>Order Number <span>#{{ $order->order_number }}</span></h3>
                                    </div>
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Items</th>
                                                    <th class="text-end" colspan="2">
                                                        <a href="javascript:void(0)" class="theme-color">Edit
                                                            Items</a>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>



                                                <tr class="table-order">
                                                    <td>
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('images/Products/' . $order->product->image) }}"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>{{ $order->product->title }}</p>
                                                        <h5>{{ $order->product->summary }}</h5>
                                                    </td>
                                                    <td>
                                                        <p>Quantity</p>
                                                        <h5>{{ $order->quantity }}</h5>
                                                    </td>
                                                    <td>
                                                        <p>Price</p>
                                                        <h5>${{ number_format($order->total_amount) }}</h5>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tfoot>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Subtotal :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>${{ number_format($order->total_amount) }}</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Shipping :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$0</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Tax(GST) :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$0</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h4 class="theme-color fw-bold">Total Price :</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="theme-color fw-bold">
                                                            ${{ number_format($order->total_amount) }}</h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="order-success">
                                                <h4>summery</h4>
                                                <ul class="order-details">
                                                    <li>Order ID: {{ $order->order_number }}</li>
                                                    <li>Order
                                                        Date:{{ $order->created_at }}
                                                    </li>
                                                    <li>Order Total: ${{ number_format($order->total_amount) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="order-success">
                                                <h4>Costumer Details</h4>
                                                <ul class="order-details">


                                                    <li>Full Name: {{ $order->user->full_name }}</li>
                                                    <li>Email: {{ $order->user->email }}</li>
                                                    <li>Phone: {{ $order->user->phone }}</li>


                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="order-success">
                                                <h4>shipping address</h4>
                                                <ul class="order-details">
                                                    <li>{{ $order->country }}</li>
                                                    <li>{{ $order->code_postal }}, {{ $order->city }}.</li>
                                                    <li>{{ $order->address }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="order-success">
                                                <div class="payment-mode">
                                                    <h4>payment method</h4>
                                                    <p>{{ $order->method_payment }}</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
