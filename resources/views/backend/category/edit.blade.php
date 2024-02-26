@extends('backend.layouts.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Category
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
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item">Edit category</li>
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
                                    action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
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
                                                value="{{ $category->title }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="summary" class="col-xl-3 col-md-4">Summary</label>
                                        <div class="col-xl-8 col-md-7">
                                            <textarea class="form-control m-0" name="summary" id="summary" cols="" rows="3">{{ $category->summary }}</textarea>
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
                                                        type="radio" name="status" @checked($category->status == 'active')>
                                                    Active
                                                </label>
                                                <label class="d-block" for="edo-ani4">
                                                    <input class="radio_animated" value="inactive" id="edo-ani4"
                                                        type="radio" name="status" @checked($category->status == 'inactive')>
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4">
                                            <label for="status" class="col-xl-3 col-sm-4 mb-0">Is Parent</label>
                                        </div>
                                        <div class="col-xl-9 col-sm-8">
                                            <div class="form-group m-checkbox-inline mb-0  d-flex ">
                                                <input class="" value="1" id="is_parent" type="checkbox"
                                                    name="is_parent" @checked($category->is_parent == 1)>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cats_parent"
                                        class="form-group row  {{ $category->is_parent == 1 ? 'd-none' : '' }}">
                                        <label for="condition" class="col-xl-3 col-sm-4 mb-0">Categories Parents</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" id="condition" name="parent_id">
                                                @foreach ($cats_parent as $item)
                                                    <option @selected($category->parent_id == $item->id) value="{{ $item->id }}">
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
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

@section('js')
    <script>
        var checkbox = document.getElementById("is_parent");
        checkbox.addEventListener("change", function() {
            document.getElementById("cats_parent").classList.toggle('d-none');
        });
    </script>
@endsection
