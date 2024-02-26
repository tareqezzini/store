@extends('backend.layouts.master')
@section('title')
    Brand
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Brand
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
                        <li class="breadcrumb-item">Brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form-inline search-form search-box">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search..">
                            </div>
                        </form>

                        <a href="{{ route('brand.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Brand</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if (file_exists(public_path('images/Brands/' . $brand->image)) && $brand->image)
                                                    <img src="{{ asset('images/Brands/' . $brand->image) }}"
                                                        data-field="image" alt="">
                                                @else
                                                    <img src="{{ asset('images/Users/default.png') }}" data-field="image"
                                                        alt="">
                                                @endif
                                            </td>

                                            <td>{{ $brand->title }}</td>
                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $brand->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $brand->status }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('brand.edit', $brand->id) }}"
                                                    class="btn btn-danger py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $brand->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.brands.delete')
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
