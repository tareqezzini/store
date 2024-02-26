@extends('backend.layouts.master')
@section('title')
    Edit Brand
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
                        <li class="breadcrumb-item">Edit Brand</li>
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
                                    action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="img" class="col-xl-3 col-md-4">Image</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="img" name="image" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-xl-3 col-md-4">Title</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="title" name="title" type="text"
                                                value="{{ $brand->title }}" required>
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
                                                        type="radio" name="status" @checked($brand->status == 'active')>
                                                    Active
                                                </label>
                                                <label class="d-block" for="edo-ani4">
                                                    <input class="radio_animated" value="inactive" id="edo-ani4"
                                                        type="radio" name="status" @checked($brand->status == 'inactive')>
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
