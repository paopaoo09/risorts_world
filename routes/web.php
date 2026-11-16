<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        return redirect()->route($request->user()->dashboardRoute());
    })->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    });

    Route::middleware('role:admin,employee')->prefix('employee')->name('employee.')->group(function () {
        Route::view('/dashboard', 'employee.dashboard')->name('dashboard');
    });

    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::view('/dashboard', 'customer.dashboard')->name('dashboard');
    });
});
