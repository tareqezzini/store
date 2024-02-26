<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="multikart">
<meta name="keywords" content="multikart">
<meta name="author" content="multikart">
<link rel="shortcut icon" href="{{ asset('images/Logo/' . App\Models\Settings::first()->fave_icon) }}"
    type="image/x-icon">
<title>Tech Stor</title>

<!--Google font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
{{-- liverwire Style --}}
@livewireStyles

<!-- Icons -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/font-awesome.css') }}">

<!--Slick slider css-->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/slick-theme.css') }}">

<!-- Animate icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/animate.css') }}">

<!-- Themify icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/themify-icons.css') }}">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/bootstrap.css') }}">

<!-- Theme css -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">

<style>
    .notification {
        transition: all .3s ease-in-out;
    }


    .product-rate i,
    .rate i {
        color: #ddd;
    }

    .product-rate i.active,
    .rate i.active {
        color: #ffa200;
    }
</style>

@yield('css')
