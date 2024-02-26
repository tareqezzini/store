@extends('backend.layouts.master')
@section('title')
    Media
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Banners
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
                        <li class="breadcrumb-item">Banners</li>
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

                        <a href="{{ route('banner.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Banner</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Condition</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>
                                                @if (file_exists(public_path('images/Banners/' . $banner->image)) && $banner->image)
                                                    <img src="{{ asset('images/Banners/' . $banner->image) }}"
                                                        data-field="image" alt="">
                                                @else
                                                    <img src="{{ asset('images/Users/default.png') }}" data-field="image"
                                                        alt="">
                                                @endif
                                            </td>

                                            <td data-field="title">{{ $banner->title }}</td>

                                            <td data-field="desc">{{ $banner->description }}</td>

                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $banner->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $banner->status }}</span>
                                            </td>
                                            <td class="condition {{ $banner->condition == 'banner' ? 'order-success' : 'order-warning' }}"
                                                data-field="status">
                                                <span>{{ $banner->condition }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('banner.edit', $banner->id) }}"
                                                    class="btn btn-danger py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $banner->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.banners.delete')
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
