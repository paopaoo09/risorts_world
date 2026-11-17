@extends('layouts.main')

@section('title', __('Employee Dashboard'))

@section('content')
    <h1 class="h3 mb-0">{{ __('Employee Dashboard') }}</h1>
    <p class="text-body-secondary">
        {{ __('Welcome, :name. Manage reservations from here.', ['name' => Auth::user()->full_name]) }}
    </p>

    <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-body-secondary small text-uppercase">{{ __('Pending reservations') }}</div>
                    <div class="fs-2 fw-semibold">
                        {{ \App\Models\Reservation::where('reservation_status', 'Pending')->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-body-secondary small text-uppercase">{{ __('Check-ins today') }}</div>
                    <div class="fs-2 fw-semibold">
                        {{ \App\Models\Reservation::whereDate('check_in_date', today())->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
