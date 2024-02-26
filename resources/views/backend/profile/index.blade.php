@extends('backend.layouts.master')
@section('title')
    Profile
@endsection

@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Profile
                                <small>Techstor Admin panel</small>
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
                            <li class="breadcrumb-item">Settings</li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card tab2-card  p-3">
                        <div class="profile-details text-center">

                            @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                                <img src="{{ asset('images/Users/' . auth()->user()->image) }}" alt=""
                                    class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                            @else
                                <img src="{{ asset('images/Users/default.png') }}" alt=""
                                    class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                            @endif
                            <h5 class="f-w-600 mb-0">{{ $user->full_name }}</h5>
                            <span>{{ $user->email }}</span>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="full_name" class="col-xl-3 col-md-2">Full Name</label>
                                    <div class="col-xl-8 ">
                                        <input type="text" class="form-control" id="full_name" name="full_name"
                                            value="{{ $user->full_name }}" required>
                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="email" class="col-xl-3 col-md-2">Email</label>
                                    <div class="col-xl-8">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="image" class="col-xl-3 col-md-2">Photo</label>
                                    <div class="col-xl-8">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="current_password" class="col-xl-3 col-md-2">Current Password</label>
                                    <div class="col-xl-8">
                                        <input class="form-control" id="current_password" name="current_password"
                                            type="password" required>
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="password_new" class="col-xl-3 col-md-2">New Password</label>
                                    <div class="col-xl-8">
                                        <input class="form-control" id="password" name="password" type="password">
                                        @error('password_new')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label for="password_confirmation" class="col-xl-3 col-md-2">Confrmation
                                        Password</label>
                                    <div class="col-xl-8">
                                        <input class="form-control" id="password_confirmation" name="password_confirmation"
                                            type="password">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
