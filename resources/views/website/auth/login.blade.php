@extends('website.layouts.master')

@section('content')
    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            @if (session('status'))
                <div class="mb-3 p-3 lead bg-success text-white">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <h3>Login</h3>
                    <div class="theme-card">
                        <form class="theme-form" method="post" action="{{ route('costumer.store') }}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control mb-2" id="email"
                                    placeholder="Email">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password" name="password" class="form-control mb-2" id="review"
                                    placeholder="Enter your password" required="">
                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-solid">Login</button>
                            <br>
                            <br>
                            <a href="{{ route('password.request') }}"
                                style="font-size: .9rem;text-transform: capitalize;letter-spacing: 1px;">forget
                                Password</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                        <a href="{{ route('auth.register') }}" class="btn btn-solid">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
