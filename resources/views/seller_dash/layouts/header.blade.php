<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="{{ route('admin') }}">
                    @if (file_exists(public_path('images/Logo/' . App\Models\Settings::first()->logo)))
                        <img class="blur-up lazyloaded d-block d-lg-none"
                            src="{{ asset('images/Logo/' . App\Models\Settings::first()->logo) }}" alt="">
                    @else
                        <h2 class="text-white">Logo</h2>
                    @endif
                </a>
            </div>
        </div>
        <div class="mobile-sidebar w-auto">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <a href="javascript:void(0)">
                        <i id="sidebar-toggle" data-feather="align-left"></i>
                    </a>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize-2"></i>
                    </a>
                </li>

                <li class="onhover-dropdown">
                    <i data-feather="bell"></i>
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <span class="badge badge-pill badge-primary pull-right notification-badge">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Notification <span
                                class="badge badge-pill badge-primary pull-right">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </li>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="{{ route('order.details', $notification->data['order_number']) }}">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0">
                                                <span>
                                                    <i class="shopping-color" data-feather="shopping-bag"></i>
                                                </span>New Order Request ..!
                                            </h6>
                                            <p class="mb-0">by: {{ $notification->data['costumer_name'] }}</p>
                                        </div>
                                    </div>
                                </a>

                            </li>
                        @endforeach
                        <li class="txt-dark"><a href="javascript:void(0)">All</a> notification</li>
                    </ul>
                </li>

                <li class="onhover-dropdown">
                    <div class="media align-items-center">
                        @if (file_exists(public_path('images/Users/' . auth()->user()->image)) && auth()->user()->image)
                            <img class="align-self-center pull-right img-50 blur-up lazyloaded"
                                src="{{ URL::asset('images/Users/' . auth()->user()->image) }}" alt="header-user">
                        @else
                            <img class="align-self-center pull-right img-50 blur-up lazyloaded"
                                src="{{ asset('images/Users/default.png') }}" alt="header-user">
                        @endif

                        <div class="dotted-animation">
                            <span class="animate-circle"></span>
                            <span class="main-circle"></span>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li>
                            <a href="{{ route('seller_profile.index') }}">
                                <i data-feather="user"></i>Edit Profile
                            </a>
                        </li>
                        <li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i data-feather="log-out"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right">
                <i data-feather="more-horizontal"></i>
            </div>
        </div>
    </div>
</div>
