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
    <link rel="icon" href="{{ asset('backend/images/dashboard/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/images/dashboard/favicon.png') }}" type="image/x-icon">
    <title>Login</title>

    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/themify-icons.css') }}">

    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/slick-theme.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">

</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container">
                <div class="row">
                    <div class="card tab2-card" style="width: 66%;">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                                        href="#top-profile" role="tab" aria-controls="top-profile"
                                        aria-selected="true"><span class="icon-user me-2"></span>Login</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                                    aria-labelledby="top-profile-tab">
                                    <form class="form-horizontal auth-form" method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        @method('post')
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="email" name="email" required="" autofocus="">

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required="">
                                        </div>
                                        <div class="form-terms">
                                            <div class="form-check mesm-2">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customControlAutosizing">
                                                <label class="form-check-label ps-2"
                                                    for="customControlAutosizing">Remember me</label>
                                                <a href="javascript:void(0)" class="btn btn-default forgot-pass">Forgot
                                                    Password!</a>
                                            </div>
                                        </div>
                                        <div class="form-button">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                        <div class="form-footer">
                                            <span>Or Login up with social platforms</span>
                                            <ul class="social">
                                                <li><a class="ti-facebook" href=""></a></li>
                                                <li><a class="ti-twitter" href=""></a></li>
                                                <li><a class="ti-instagram" href=""></a></li>
                                                <li><a class="ti-pinterest" href=""></a></li>
                                            </ul>
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

    <!-- latest jquery-->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/js/icons/feather-icon/feather-icon.js') }}"></script>

    <script src="{{ asset('backend/js/slick.js') }}"></script>

    <script>
        $('.single-item').slick({
            arrows: false,
            dots: true
        });
    </script>

</body>

</html>
