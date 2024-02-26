@extends('website.layouts.master')

@section('content')
    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            @if (session('status'))
                <div class="mb-3 p-3 lead bg-success text-white">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <h2>Forget Your Password</h2>
                    <div class="mb-4 text-sm text-gray-600 m-auto">
                        Forgot your password? No problem. Just let us know your email address and we will email you a
                        password
                        reset link that will allow you to choose a new one.
                    </div>
                    <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Your Email" required="">
                            </div><button type="submit" class="btn btn-solid w-auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends--
@endsection
