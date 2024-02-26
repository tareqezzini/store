<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="{{ route('admin') }}">
                @if (file_exists(public_path('images/Logo/logo-sotre-white.png')))
                    <img class="d-none d-lg-block blur-up lazyloaded"
                        src="{{ asset('images/Logo/logo-sotre-white.png') }}" alt="logo">
                @else
                    <h2 class="text-white">Logo</h2>
                @endif
            </a>

        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <div class="sidebar-user">
            @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                <img class="img-60" src="{{ asset('images/Users/' . auth()->user()->image) }}" alt="#">
            @else
                <img class="img-60" src="{{ asset('images/Users/default.png') }}" alt="#">
            @endif
            <div>
                <h6 class="f-14">{{ auth()->user()->role }}</h6>
                <p>general manager.</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="/seller">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Products</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('seller_products.index') }}">
                            <i class="fa fa-circle"></i>List Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('seller_products.create') }}">
                            <i class="fa fa-circle"></i>Create Product
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Orders</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('seller_orders.index') }}">
                            <i class="fa fa-circle"></i>List Orders
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
