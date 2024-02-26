@extends('backend.layouts.master')
@section('title')
    Add Persson To The Team
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Team
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
                        <li class="breadcrumb-item">Team</li>
                        <li class="breadcrumb-item">Add Team</li>
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
                                <form class="needs-validation user-add" method="POST" action="{{ route('team.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="form-group row">
                                        <label for="img" class="col-xl-3 col-md-4">Image</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="img" name="image" type="file"
                                                required>
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="full_name" class="col-xl-3 col-md-4">Full Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="full_name" name="full_name" type="text"
                                                value="{{ old('full_name') }}" required>
                                        </div>
                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-xl-3 col-md-4">Position</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="position" name="position" type="text"
                                                value="{{ old('position') }}" required>
                                        </div>
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                        type="radio" name="status" checked>
                                                    Active
                                                </label>
                                                <label class="d-block" for="edo-ani4">
                                                    <input class="radio_animated" value="inactive" id="edo-ani4"
                                                        type="radio" name="status">
                                                    Inactive
                                                </label>
                                            </div>
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
