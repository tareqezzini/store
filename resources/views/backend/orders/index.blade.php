@extends('backend.layouts.master')
@section('title')
    Orders
@endsection
@section('css')
    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/datatables.css') }}">
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Orders
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
                        <li class="breadcrumb-item">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>order number</th>
                            <th>Full Name</th>
                            <th>Status Payment</th>
                            <th>Total</th>
                            <th>Status Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>
                                    <button class="border-0 bg-white" data-bs-toggle="modal"
                                        data-bs-target="#costumer{{ $order->id }}"
                                        style="color:
                                                    #205e7e;">{{ $order->user->full_name }}</button>
                                </td>
                                <td class="status" data-field="status">
                                    <span
                                        class=" badge  {{ $order->status_payment == 'paid' ? 'badge-success' : 'badge-primary' }}">{{ $order->status_payment }}</span>
                                </td>
                                <td>${{ number_format($order->sub_total, 2) }}</td>
                                <td class="status" data-field="status">
                                    @if ($order->status_order == 'pending')
                                        <span class=" badge badge-dark">{{ $order->status_order }}</span>
                                    @elseif ($order->status_order == 'process')
                                        <span class=" badge badge-info">{{ $order->status_order }}</span>
                                    @elseif ($order->status_order == 'delivered')
                                        <span class=" badge badge-success">{{ $order->status_order }}</span>
                                    @else
                                        <span class=" badge badge-primary">{{ $order->status_order }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('order.details', $order->order_number) }}"
                                        class="btn btn-secondary py-1 px-2">
                                        <i class="fa fa-eye btn p-0 text-white"></i>
                                    </a>
                                    <button type="button" class="btn btn-info py-1 px-2" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $order->id }}">
                                        <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                    </button>

                                    @if ($order->status_order == 'delivered' || $order->status_order == 'cancelled')
                                        <button type="button" class="btn btn-primary py-1 px-2" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $order->id }}">
                                            <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @include('backend.orders.update')
                            @include('backend.orders.delete')
                            @include('backend.orders.costumer_details')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
    <!-- Datatables js-->
    <script src="{{ asset('backend/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/datatables/custom-basic.js') }}"></script>
@endsection
