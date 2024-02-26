@extends('website.layouts.master')

@section('content')
    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="{{ asset('images/Users/' . $user->image) }}" alt="" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{ $user->full_name }}</h5>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#dashboard"
                                        class="nav-link active">Dashboard</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#info"
                                        class="nav-link ">Account Info</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#address"
                                        class="nav-link">Address</a></li>
                                <li class="nav-item"><a id="changePass" data-bs-toggle="tab"
                                        data-bs-target="#change_password" class="nav-link">Change Password</a> </li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#orders" class="nav-link">My
                                        Orders</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Log Out</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="dashboard">
                            <div class="counter-section">
                                <div class="welcome-msg">
                                    <h4>Hello, {{ $user->full_name }} !</h4>
                                    <p>From your My Account Dashboard you have the ability to view a snapshot of your
                                        recent
                                        account activity and update your account information. Select a link below to
                                        view or
                                        edit information.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/sale.png') }}"
                                                class="img-fluid">
                                            <div>
                                                <h3>{{ count($orders) }}</h3>
                                                <h5>Total Order</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/homework.png') }}"
                                                class="img-fluid">
                                            <div>
                                                <h3>{{ $orders->where('status_order', 'pending')->count() }}</h3>
                                                <h5>Pending Orders</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/order.png') }}"
                                                class="img-fluid">
                                            <div>
                                                <h3>{{ $orders->where('status_order', 'delivered')->count() }}</h3>
                                                <h5>Delivered Orders</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Contact Information</h3>
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ $user->full_name }}</h6>
                                                    <h6>{{ $user->email }}</h6>
                                                    <h6><a style="cursor: pointer" onclick="changePass()">Change
                                                            Password</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade contact-page " id="info">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>PERSONAL DETAIL</h3>
                                            </div>
                                            <div class="account-info-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form class="theme-form" method="POST"
                                                            action="{{ route('update.accountInfo', 1) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-row row">
                                                                <div class="col-md-6">
                                                                    <label for="name">Avater</label>
                                                                    <input type="file" class="form-control"
                                                                        id="avatar" name="image">
                                                                    @error('avater')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="name">Full Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="full_name"
                                                                        value="{{ $user->full_name }}"
                                                                        placeholder="Enter Your name" required>
                                                                    @error('full_name')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="user_name">UserName</label>
                                                                    <input type="text" class="form-control"
                                                                        id="user_name" name="user_name"
                                                                        value="{{ $user->user_name }}"
                                                                        placeholder="UserName" required>
                                                                    @error('user_name')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="review">Phone number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="review" placeholder="Enter your number"
                                                                        name="phone" value="{{ $user->phone }}"
                                                                        required>
                                                                    @error('phone')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        id="email" placeholder="Email" name="email"
                                                                        value="{{ $user->email }}" disabled required>
                                                                    @error('email')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="password">Curent Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Password" required>
                                                                    @error('password')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-sm btn-solid"
                                                                        type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade contact-page" id="address">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Address DETAIL</h3>
                                            </div>
                                            <div class="account-info-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form class="theme-form" method="POST"
                                                            action="{{ route('update.address', 1) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')

                                                            <div class="form-row row">
                                                                <div class="col-md-6">
                                                                    <label for="address">Address</label>
                                                                    <input type="text" class="form-control"
                                                                        id="address" address="address" name="address"
                                                                        value="{{ $user->address }}"
                                                                        placeholder="Enter Your address" required>
                                                                    @error('name')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control"
                                                                        id="state" name="state"
                                                                        value="{{ $user->state }}" placeholder="State"
                                                                        required>
                                                                    @error('state')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="country">Country</label>
                                                                    <input type="text" class="form-control"
                                                                        id="country" placeholder="Enter your country"
                                                                        name="country" value="{{ $user->country }}"
                                                                        required>
                                                                    @error('country')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="email">city</label>
                                                                    <input type="text" class="form-control"
                                                                        id="city" placeholder="city" name="city"
                                                                        value="{{ $user->city }}" required>
                                                                    @error('city')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="code_postal">Code postal</label>
                                                                    <input type="text" class="form-control"
                                                                        id="code_postal" placeholder="code_postal"
                                                                        name="code_postal"
                                                                        value="{{ $user->code_postal }}" required>
                                                                    @error('code_postal')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="password">Curent Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Password" required>
                                                                    @error('password')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-sm btn-solid"
                                                                        type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade contact-page" id="change_password">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Address DETAIL</h3>
                                            </div>
                                            <div class="account-info-section">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form class="theme-form" method="POST"
                                                            action="{{ route('update.password', 1) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-row row">
                                                                <div class="col-md-8">
                                                                    <label for="current_password">Curent Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="current_password" name="current_password"
                                                                        placeholder="current password" required>
                                                                    @error('current_password')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <label for="new_password">New Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="new_password" name="new_password"
                                                                        placeholder="new password" required>
                                                                    @error('new_password')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <label for="password_confirmation">Confirmation
                                                                        Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password_confirmation"
                                                                        name="new_password_confirmation"
                                                                        placeholder="confirmation password" required>
                                                                    @error('password_confirmation')
                                                                        <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-sm btn-solid"
                                                                        type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Orders</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table order-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Product Details</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($orders as $order)
                                                            <tr>
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="../assets/images/pro3/2.jpg"
                                                                            class="blur-up lazyloaded" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="mt-0">#{{ $order->order_number }}</span>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="fs-6">{{ $order->product->title }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($order->status_order == 'pending')
                                                                        <span
                                                                            class="badge rounded-pill .bg-warning custom-badge">Pending</span>
                                                                    @elseif ($order->status_order == 'process')
                                                                        <span
                                                                            class="badge rounded-pill bg-secondary custom-badge">Process</span>
                                                                    @elseif ($order->status_order == 'delivered')
                                                                        <span
                                                                            class="badge rounded-pill bg-success custom-badge">Delivered</span>
                                                                    @else
                                                                        <span
                                                                            class="badge rounded-pill bg-danger custom-badge">Cancelled</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="theme-color fs-6">{{ App\Utils\Helper::convertPrice($order->sub_total) }}</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->
@endsection
@section('js')
    <script>
        function changePass() {
            document.getElementById('changePass').click();
        }
    </script>
@endsection
