@extends('layouts.main')

@section('title', __('Admin Dashboard'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">{{ __('Admin Dashboard') }}</h1>
            <p class="text-body-secondary mb-0">
                {{ __('Welcome, :name. You are signed in as an administrator.', ['name' => Auth::user()->full_name]) }}
            </p>
        </div>
    </div>

    <div class="row g-3">
        @foreach ([
            __('Users') => \App\Models\User::count(),
            __('Accommodations') => \App\Models\Accommodation::count(),
            __('Packages') => \App\Models\Package::count(),
            __('Reservations') => \App\Models\Reservation::count(),
        ] as $label => $count)
            <div class="col-sm-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-body-secondary small text-uppercase">{{ $label }}</div>
                        <div class="fs-2 fw-semibold">{{ $count }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
