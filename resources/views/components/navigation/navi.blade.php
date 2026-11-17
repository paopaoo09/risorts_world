
<header class="nav">
    <nav class="nav-inner" aria-label="Main navigation">

        <!-- Mobile Menu Toggle -->
        <button class="nav-toggle"
                aria-label="Toggle navigation"
                onclick="document.getElementById('nav-links').classList.toggle('open')">
            ☰
        </button>

        <!-- Left Navigation Links -->
        <ul class="nav-links" id="nav-links">
            <li>
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'active' : '' }}">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ url('/rooms') }}"
                   class="{{ request()->is('rooms*') ? 'active' : '' }}">
                    Rooms
                </a>
            </li>

            <li>
                <a href="{{ url('/amenities') }}"
                   class="{{ request()->is('amenities*') ? 'active' : '' }}">
                    Amenities
                </a>
            </li>

            <li>
                <a href="{{ url('/reservation') }}"
                   class="{{ request()->is('reservation*') ? 'active' : '' }}">
                    Reservation
                </a>
            </li>
        </ul>

        <!-- Center Logo -->
        <a href="{{ url('/') }}" class="nav-logo">
            <img src="{{ asset('images/amalogo.png') }}"
                 alt="Amaryllis Cove Resorts">
        </a>

        <!-- Right Navigation -->
        <div class="nav-right">

            @auth
                <span>{{ Auth::user()->name }}</span>
            @else
                <a href="{{ url('/login') }}" class="nav-login">
                    Login
                </a>
            @endauth

            <a href="{{ auth()->check() ? url('/profile') : url('/login') }}"
               class="nav-avatar"
               aria-label="Account">

                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"/>
                </svg>

            </a>
        </div>

    </nav>
</header>
