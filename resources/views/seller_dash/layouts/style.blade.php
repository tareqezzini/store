<style>
    .loader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0f0f0fc2;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #ff4c3b;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    .rate i {
        color: #ddd;
    }


    .rate i.active {
        color: #ffa200;
    }
</style>
<!-- Google font-->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

@yield('css')

<!-- Font Awesome-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/font-awesome.css') }}">

<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/flag-icon.css') }}">

<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/icofont.css') }}">

<!-- Prism css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/prism.css') }}">

<!-- Chartist css -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/chartist.css') }}">

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/bootstrap.css') }}">

<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
