@extends('layouts.main')

@section('hero')
    <section class="hero py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-semibold">{{ __('Your getaway starts here') }}</h1>
                    <p class="lead opacity-75 mb-4">
                        {{ __('Browse our rooms, cottages and packages, then book your stay online in a few minutes.') }}
                    </p>

                    @auth
                        <a href="{{ route(Auth::user()->dashboardRoute()) }}" class="btn btn-light btn-lg">
                            {{ __('Go to my dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">{{ __('Book a stay') }}</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">{{ __('Log in') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row g-4 py-3">
        <div class="col-md-4">
            <h2 class="h5">{{ __('Accommodations') }}</h2>
            <p class="text-body-secondary">{{ __('Rooms and cottages for couples, families and groups.') }}</p>
        </div>
        <div class="col-md-4">
            <h2 class="h5">{{ __('Packages') }}</h2>
            <p class="text-body-secondary">{{ __('Bundled stays with meals and activities included.') }}</p>
        </div>
        <div class="col-md-4">
            <h2 class="h5">{{ __('Amenities') }}</h2>
            <p class="text-body-secondary">{{ __('Pools, dining and everything else you need to unwind.') }}</p>
        </div>
    </div>
@endsection
