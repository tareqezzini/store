<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="index.html">
                @if (file_exists(public_path('images/Logo/' . App\Models\Settings::first()->logo)))
                    <img class="d-none d-lg-block blur-up lazyloaded"
                        src="{{ asset('images/Logo/' . App\Models\Settings::first()->logo) }}" alt="logo">
                @else
                    <h2>Logo</h2>
                @endif

            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <div class="sidebar-user">


            @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                <img class="img-60" src="{{ asset('images/Users/' . auth()->user()->image) }}" alt="avater">
            @else
                <img class="img-60" src="{{ asset('images/Users/default.png') }}" alt="avater">
            @endif
            <div>
                <h6 class="f-14">{{ auth()->user()->full_name }}</h6>
                <p>{{ auth()->user()->role }}</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{ route('admin') }}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="user-plus"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('user.index') }}">
                            <i class="fa fa-circle"></i>List Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}">
                            <i class="fa fa-circle"></i>Create User
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="user-plus"></i>
                    <span>Vendors</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('vendor.index') }}">
                            <i class="fa fa-circle"></i>List Vendors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.create') }}">
                            <i class="fa fa-circle"></i>Create Vendor
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Categories</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="fa fa-circle"></i>List Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.create') }}">
                            <i class="fa fa-circle"></i>Create Category
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Brands</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('brand.index') }}">
                            <i class="fa fa-circle"></i>List Brands
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('brand.create') }}">
                            <i class="fa fa-circle"></i>Create Brand
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span>Procuts</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-circle"></i>List Procuts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.create') }}">
                            <i class="fa fa-circle"></i>Create Product
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('order.index') }}">
                    <i data-feather="archive"></i>
                    <span>Orders</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

            </li>



            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="dollar-sign"></i>
                    <span>Currencies</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('currency.index') }}">
                            <i class="fa fa-circle"></i>List Currencies
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('currency.create') }}">
                            <i class="fa fa-circle"></i>Create Currency
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="users"></i>
                    <span>Team</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('team.index') }}">
                            <i class="fa fa-circle"></i>List Team
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('team.create') }}">
                            <i class="fa fa-circle"></i>Create Team
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="{{ route('about.index') }}">
                    <i data-feather="tag"></i>
                    <span>About</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="camera"></i>

                    <span>Banners</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('banner.index') }}">
                            <i class="fa fa-circle"></i>List Banners
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('banner.create') }}">
                            <i class="fa fa-circle"></i>Create Banner
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('settings.index') }}">
                    <i data-feather="settings"></i>
                    <span>Settings</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
