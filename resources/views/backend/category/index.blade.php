@extends('backend.layouts.master')
@section('title')
    Categories
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Categories
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
                        <li class="breadcrumb-item">Categories</li>
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

                        <a href="{{ route('category.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Category</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Is Parent</th>
                                        <th>Summary</th>
                                        <th>Parent</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if (file_exists(public_path('images/Categories/' . $category->image)) && $category->image)
                                                    <img src="{{ asset('images/Categories/' . $category->image) }}"
                                                        data-field="image" alt="">
                                                @else
                                                    <img src="{{ asset('images/Users/default.png') }}" data-field="image"
                                                        alt="">
                                                @endif
                                            </td>

                                            <td>{{ $category->title }}</td>

                                            <td>
                                                @if ($category->is_parent == 1)
                                                    <span class=" badge  badge-success">Yes</span>
                                                @else
                                                    <span class=" badge  badge-primary">No</span>
                                                @endif
                                            </td>
                                            <td>{{ $category->summary }}</td>
                                            <td>{{ app\Models\Category::where('id', $category->parent_id)->value('title') }}
                                            </td>

                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $category->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $category->status }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-danger py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $category->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.category.delete')
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
