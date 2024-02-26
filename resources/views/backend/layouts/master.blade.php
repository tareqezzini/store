<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/Logo/' . App\Models\Settings::first()->fave_icon) }}"
        type="image/x-icon">
    <title>@yield('title')</title>
    @include('backend.layouts.style')
</head>

<body>
    <!-- Loader Start-->
    <div class="loader-overlay" id="loader-overlay">
        <div class="loader"></div>
    </div>
    <!-- Loader End-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        @include('backend.layouts.header')
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('backend.layouts.sidebar')
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success notification">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger notification">{{ session('error') }}</div>
                @endif

                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
            </div>

            <!-- footer start-->
            @include('backend.layouts.footer')
            <!-- footer end-->
        </div>
    </div>
    @include('backend.layouts.script')
</body>

</html>
