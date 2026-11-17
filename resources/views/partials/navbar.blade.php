<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ url('/') }}">
            {{ config('app.name', 'Risorts World') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs(Auth::user()->dashboardRoute())) active @endif"
                           href="{{ route(Auth::user()->dashboardRoute()) }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>

                    @if (Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link @if (request()->routeIs('employee.*')) active @endif"
                               href="{{ route('employee.dashboard') }}">
                                {{ __('Staff Area') }}
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm ms-lg-2 mt-2 mt-lg-0" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->full_name }}
                            <span class="badge text-bg-light ms-1">{{ Auth::user()->role }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Log out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
