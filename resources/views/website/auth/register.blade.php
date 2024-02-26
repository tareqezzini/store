@extends('website.layouts.master')

@section('content')
    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" method="post" action="{{ route('register') }}">
                            @csrf
                            @method('post')
                            <div class="form-row row mt-1">
                                <div class="col-md-6">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control mb-2" id="full_name" name="full_name"
                                        placeholder="Enter your Full Name" value="{{ old('full_name') }}" required>
                                    @error('full_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="user_name">UserName</label>
                                    <input type="text" class="form-control mb-2" id="user_name" name="user_name"
                                        placeholder="Enter your UserName" value="{{ old('user_name') }}" required>
                                    @error('user_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row row mt-1">
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control mb-2" id="email" name="email"
                                        placeholder="Enter your Email" required value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control mb-2" id="phone" name="phone"
                                        placeholder="Enter your Phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row row mt-1">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mb-2" id="password" name="password"
                                        placeholder="Enter your password" value="{{ old('password') }}" required>
                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 ">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" class="form-control mb-2" id="password_confirmation"
                                        name="password_confirmation" placeholder="Enter your Password Confirmation"
                                        value="{{ old('password_confirmation') }}" required>
                                    @error('password_confirmation')
                                        <span class="text-danger des mb-3">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-row row mt-1">
                                    <label for="status" class="col-xl-3 col-sm-4 ">Role</label>
                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                        <label class="d-block" for="edo-ani3">
                                            <input class="radio_animated" value="costumer" id="edo-ani3" type="radio"
                                                name="role" style="accent-color:#ff4c3b" checked>
                                            Costumer
                                        </label>
                                        <label class="d-block  mx-3" for="edo-ani4">
                                            <input class="radio_animated" value="seller" id="edo-ani4" type="radio"
                                                name="role" style="accent-color:#ff4c3b">
                                            Seller
                                        </label>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-solid w-auto mt-2">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
