@extends('backend.layouts.master')
@section('title')
    Vendors
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
                        <h3>Vendors
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
                        <li class="breadcrumb-item">Vendors</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('vendor.create') }}" class="btn btn-primary mt-md-0 mt-2 pull-right">Create Vendor</a>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avater</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                                        <img src="{{ asset('images/Users/' . $vendor->image) }}" data-field="image"
                                            alt="" width="60">
                                    @else
                                        <img src="{{ asset('images/Users/default.png') }}" data-field="image" alt=""
                                            width="60">
                                    @endif
                                </td>
                                <td>{{ $vendor->full_name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td class="status" data-field="status">
                                    <span
                                        class=" badge  {{ $vendor->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $vendor->status }}</span>
                                </td>

                                <td>
                                    <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-info py-1 px-2">
                                        <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-primary py-1 px-2" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $vendor->id }}">
                                        <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                    </button>
                                </td>
                            </tr>
                            @include('backend.vendors.delete')
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
