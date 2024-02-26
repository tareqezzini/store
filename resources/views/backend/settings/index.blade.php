@extends('backend.layouts.master')
@section('title')
    Settings
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Settings
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
                        <li class="breadcrumb-item">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <form class="needs-validation user-add" method="POST"
                                    action="{{ route('settings.update', $settings->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row mb-3">
                                        <label for="name_app" class="col-xl-3 col-md-4">App Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="name_app" name="name_app" type="text"
                                                value="{{ $settings->name_app }}" required>
                                            @error('name_app')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="email" class="col-xl-3 col-md-4">Email</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="email" name="email" type="text"
                                                value="{{ $settings->email }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="phone" class="col-xl-3 col-md-4">phone</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="phone" name="phone" type="text"
                                                value="{{ $settings->phone }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="address" class="col-xl-3 col-md-4">address</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="address" name="address" type="text"
                                                value="{{ $settings->address }}" required>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="facebook" class="col-xl-3 col-md-4">Url Facebook</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="facebook" name="facebook" type="url"
                                                value="{{ $settings->facebook }}" required>
                                            @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="instagram" class="col-xl-3 col-md-4">Url Instagram</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="instagram" name="instagram" type="url"
                                                value="{{ $settings->instagram }}" required>
                                            @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="img" class="col-xl-3 col-md-4">Logo</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="img" name="logo" type="file">
                                            @error('logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="img" class="col-xl-3 col-md-4">Fav Icon</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="img" name="fave_icon" type="file">
                                            @error('fave_icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="desc" class="col-xl-3 col-md-4">Description</label>
                                        <div class="col-xl-8 col-md-7">
                                            <textarea class="form-control m-0" name="description" id="desc" cols="" rows="5" required>{{ $settings->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
