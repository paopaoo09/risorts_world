@extends('layouts.main')

@section('title', __('My Dashboard'))

@section('content')
    <h1 class="h3 mb-0">{{ __('My Dashboard') }}</h1>
    <p class="text-body-secondary">
        {{ __('Welcome, :name. View and manage your reservations here.', ['name' => Auth::user()->full_name]) }}
    </p>

    <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-body-secondary small text-uppercase">{{ __('My reservations') }}</div>
                    <div class="fs-2 fw-semibold">{{ Auth::user()->reservations()->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-body-secondary small text-uppercase">{{ __('Upcoming stays') }}</div>
                    <div class="fs-2 fw-semibold">
                        {{ Auth::user()->reservations()->whereDate('check_in_date', '>=', today())->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
