@extends('backend.layouts.master')
@section('title')
    Currencies
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Currencies
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
                        <li class="breadcrumb-item">Currencies</li>
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

                        <a href="{{ route('currency.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Currency</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>code</th>
                                        <th>symbol</th>
                                        <th>exchange</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($currencies as $currency)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $currency->name }}</td>
                                            <td>{{ $currency->code }}</td>
                                            <td>{{ $currency->symbol }}</td>
                                            <td>{{ $currency->exchange }}</td>



                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $currency->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $currency->status }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('currency.edit', $currency->id) }}"
                                                    class="btn btn-danger py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $currency->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.currency.delete')
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
