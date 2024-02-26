@extends('backend.layouts.master')
@section('title')
    Team
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

                        <a href="{{ route('team.create') }}" class="btn btn-primary add-row mt-md-0 mt-2">Add
                            Team</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($team as $person)
                                        <tr>
                                            <td>
                                                @if (file_exists(public_path('images/Team/' . $person->image) && $person->image))
                                                    <img src="{{ asset('images/Team/' . $person->image) }}"
                                                        data-field="image" alt="">
                                                @else
                                                    <img src="{{ asset('images/Users/default.png') }}" data-field="image"
                                                        alt="">
                                                @endif
                                            </td>
                                            <td data-field="desc">{{ $person->full_name }}</td>
                                            <td data-field="title">{{ $person->position }}</td>
                                            <td class="status" data-field="status">
                                                <span
                                                    class=" badge  {{ $person->status == 'active' ? 'badge-success' : 'badge-primary' }}">{{ $person->status }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('team.edit', $person->id) }}"
                                                    class="btn btn-danger py-1 px-2">
                                                    <i class="fa fa-edit btn p-0 text-white" title="Edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary py-1 px-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $person->id }}">
                                                    <i class="fa fa-trash btn p-0 text-white" title="Delete"></i>

                                                </button>
                                            </td>
                                        </tr>
                                        @include('backend.team.delete')
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
