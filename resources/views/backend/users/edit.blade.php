@extends('backend.layouts.master')
@section('title')
    Add User
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>User
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
                        <li class="breadcrumb-item">User</li>
                        <li class="breadcrumb-item">Add User</li>
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
                                    action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="img" class="col-xl-3 col-md-4">Image</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="img" name="image" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-xl-3 col-md-4">Email</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="email" name="email" type="text"
                                                value="{{ $user->email }}" placeholder="Enter email ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-xl-3 col-md-4">Pssword</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Enter password ....">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="full_name" class="col-xl-3 col-md-4">Full name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="full_name" name="full_name" type="text"
                                                value="{{ $user->full_name }}" placeholder="Enter full name ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_name" class="col-xl-3 col-md-4">UserName</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="user_name" name="user_name" type="text"
                                                value="{{ $user->user_name }}" placeholder="Enter user_name ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-xl-3 col-md-4">Phone</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="phone" name="phone" type="text"
                                                value="{{ $user->phone }}" placeholder="Enter phone ...." required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="role" class="col-xl-3 col-sm-4 mb-0">Role</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="role" name="role">
                                                <option value="" selected disabled>---- Select the Role ----
                                                </option>
                                                <option value="admin" @selected($user->role == 'admin')>Admin</option>
                                                <option value="vendor" @selected($user->role == 'vendor')>Vendor</option>
                                                <option value="costumer" @selected($user->role == 'costumer')>Costumer</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4">
                                            <label for="status" class="col-xl-3 col-sm-4 mb-0">Status</label>
                                        </div>
                                        <div class="col-xl-9 col-sm-8">
                                            <div
                                                class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                <label class="d-block" for="edo-ani3">
                                                    <input class="radio_animated" value="active" id="edo-ani3"
                                                        type="radio" name="status" @checked($user->status == 'active')>
                                                    Active
                                                </label>
                                                <label class="d-block" for="edo-ani4">
                                                    <input class="radio_animated" value="inactive" id="edo-ani4"
                                                        type="radio" name="status" @checked($user->status == 'inactive')>
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
