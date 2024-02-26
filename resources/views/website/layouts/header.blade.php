<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        @if (App\Models\Settings::first())
                            <ul>
                                <li>Welcome to Our store {{ App\Models\Settings::first()->name_app }}</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us:
                                    {{ App\Models\Settings::first()->phone }}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="{{ route('wishlist.index') }}"><i class="fa fa-heart"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                                @auth
                                    <li><a href="{{ route('user.account') }}">Account</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                                        </li>
                                    </form>
                                @endauth
                                @guest
                                    <li><a href="{{ route('auth.login') }}">Login</a></li>
                                    <li><a href="{{ route('auth.register') }}">register</a></li>
                                @endguest



                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="/">
                                @if (App\Models\Settings::first())
                                    @if (App\Models\Settings::first()->logo)
                                        <img src="{{ asset('images/Logo/' . App\Models\Settings::first()->logo) }}"
                                            class="img-fluid blur-up lazyload" alt="logo">
                                    @else
                                        <h2>Logo</h2>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li><a href="/">Home</a></li>
                                    <li>
                                        <a href="{{ route('shop') }}">shop</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us.index') }}">contact us</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('about_us.index') }}">about us</a>

                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>

                                    <li class="onhover-div mobile-setting">
                                        <div>
                                            <img src="{{ asset('frontend/assets/images/icon/setting.png') }}"
                                                class="img-fluid blur-up lazyload" alt=""> <i
                                                class="ti-settings"></i>
                                        </div>
                                        <div class="show-div setting">
                                            {{-- <h6>language</h6>
                                            <ul>
                                                <li><a href="#">english</a></li>
                                                <li><a href="#">french</a></li>
                                            </ul> --}}
                                            <h6>currency</h6>
                                            <ul class="list-inline currency">
                                                @php
                                                    if (!session()->has('currency_code')) {
                                                        App\Utils\Helper::loadCurrency();
                                                    }
                                                @endphp
                                                <style>
                                                    ul.currency li a.active {
                                                        color: #ff4c3b !important;
                                                    }
                                                </style>
                                                @foreach (App\Models\Currency::where('status', 'active')->get() as $currency)
                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="{{ $currency->code == session('currency_code') ? 'active' : '' }}"
                                                            onclick="changeCurrency('{{ $currency->code }}')">{{ $currency->name }}
                                                            ({{ $currency->code }})
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    @livewire('show-cart')

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
