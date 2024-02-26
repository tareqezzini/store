@extends('backend.layouts.master')
@section('title')
    Users
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Users
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
                        <li class="breadcrumb-item">Users</li>
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

                        <a href="{{ route('user.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Product</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Avater</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                                                    <img src="{{ asset('images/Users/' . $user->image) }}"
                                                        data-field="image" alt="">
                                                @else
                                                    <img src="{{ asset('images/Users/default.png') }}" data-field="image"
                                                        alt="">
                                                @endif
                                            </td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $user->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $user->status }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-info py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.users.delete')
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
