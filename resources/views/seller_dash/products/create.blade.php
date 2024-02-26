@extends('seller_dash.layouts.master')
@section('title')
    Add Product
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product
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
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item">Add Product</li>
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
                                    action="{{ route('seller_products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
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
                                                value="{{ old('title') }}" placeholder="Enter ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-xl-3 col-md-4">Price</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="price" name="price" type="text"
                                                value="{{ old('price') }}" placeholder="Enter price ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-xl-3 col-md-4">Discount</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="discount" name="discount" type="number"
                                                value="{{ old('discount') }}" placeholder="Enter discount ...." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stock" class="col-xl-3 col-md-4">Stock</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="stock" name="stock" type="number"
                                                value="{{ old('stock') }}" placeholder="Enter stock ...." required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="summary" class="col-xl-3 col-md-4">Summary</label>
                                        <div class="col-xl-8 col-md-7">
                                            <textarea class="form-control m-0" name="summary" value="{{ old('summary') }}" id="summary" cols=""
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-xl-3 col-md-4">Description</label>
                                        <div class="col-xl-8 col-md-7">
                                            <textarea class="form-control m-0" name="description" value="{{ old('description') }}" id="description" cols=""
                                                rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="brand_id" class="col-xl-3 col-sm-4 mb-0">Brand</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="brand_id" name="brand_id">
                                                <option value="" selected disabled>---- Select the Brand ----
                                                </option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cat_id" class="col-xl-3 col-sm-4 mb-0">Categories Parents</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="cat_id" name="cat_id">
                                                <option value="" selected disabled>---- Select the Category Parent
                                                    ----
                                                </option>

                                                @foreach ($cats_parent as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="child_cat_id" class="col-xl-3 col-sm-4 mb-0">Categories Child</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="child_cat_id" name="child_cat_id">
                                                <option value="" selected disabled>---- Select the Sub Category ----
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="condition" class="col-xl-3 col-sm-4 mb-0">Condition</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="condition" name="condition">
                                                <option value="" selected disabled>---- Select the Condintion
                                                    ----
                                                </option>
                                                <option value="new">new</option>
                                                <option value="popular">popular</option>
                                                <option value="winter">winter</option>

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

@section('js')
    <script>
        // alert("Hello! I am an alert box!!");
        $(document).ready(function() {
            $('select[name = "cat_id"]').on('change', function() {
                var cat_id = $(this).val();
                if (cat_id) {
                    console.log(cat_id);
                    $.ajax({
                        url: "{{ URL::to('/seller/get_cat_children') }}/" + cat_id,
                        typ: "GET",
                        dataType: "json",

                        success: function(data) {

                            $('select[name="child_cat_id"]').empty();

                            $('select[name = "child_cat_id"]').append(
                                '<option selected disabled >---Select The Sub Category---</option>'
                            );


                            $.each(data, function(key, child_cat_id) {
                                $('select[name = "child_cat_id"]').append(
                                    '<option value="' +
                                    child_cat_id['id'] + '" >' + child_cat_id[
                                        'title'] +
                                    '</option>');
                            });
                        },

                    });
                }
            });
        });
    </script>
@endsection
