@extends('backend.layouts.master')
@section('title')
    Add Currency
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Currency
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
                        <li class="breadcrumb-item">Currency</li>
                        <li class="breadcrumb-item">Add Currency</li>
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
                                    action="{{ route('currency.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <div class="form-group row">
                                        <label for="name" class="col-xl-1 col-md-2">Name</label>
                                        <div class="col-xl-5 col-md-12">
                                            <input class="form-control" id="name" name="name" type="text"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="text-danger mt-2">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="code" class="col-xl-1 col-md-2">Code</label>
                                        <div class="col-xl-5 col-md-12">
                                            <input class="form-control" id="code" name="code" type="text"
                                                value="{{ old('code') }}" required>
                                            @error('code')
                                                <span class="text-danger mt-2">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="symbol" class="col-xl-1 col-md-2">Symbol</label>
                                        <div class="col-xl-5 col-md-12">
                                            <input class="form-control" id="symbol" name="symbol" type="text"
                                                value="{{ old('symbol') }}" required>
                                            @error('symbol')
                                                <span class="text-danger mt-2">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exchange" class="col-xl-1 col-md-2">Exchange</label>
                                        <div class="col-xl-5 col-md-12">
                                            <input class="form-control" id="exchange" name="exchange" type="number"
                                                step="0.01" value="{{ old('exchange') }}" required>
                                            @error('exchange')
                                                <span class="text-danger mt-2">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-xl-1 col-sm-4 mb-0">Status</label>
                                        <div class="col-xl-5 col-md-12">
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
                                        <a href="{{ route('currency.index') }}" class="btn btn-primary">Back</a>
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

@section('js')
    <script>
        var checkbox = document.getElementById("is_parent");
        checkbox.addEventListener("change", function() {
            document.getElementById("cats_parent").classList.toggle('d-none');
        });
    </script>
@endsection
