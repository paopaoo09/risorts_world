{{--
    Shared split-screen layout for every auth page.
    Usage: <x-auth-shell title="Welcome back" subtitle="..."> form here </x-auth-shell>
    `compact` gives the form a wider column for two-column forms (e.g. register).
    `reverse` puts the photo on the left and the form on the right.
    `pageTitle` sets the browser tab text (defaults to `title`).
    An optional <x-slot:showcase> replaces the perks bar on the photo.
--}}
@props([
    'title',
    'pageTitle' => null,
    'subtitle' => null,
    'compact' => false,
    'reverse' => false,
    'image' => 'images/login-hero.jpg',          // photo in public/, per page
    'imagePosition' => 'object-[center_65%]',   // which part of the photo stays in view
    'imageAlt' => 'Poolside cabanas and palm trees at Amaryllis Cove at sunset',
])

@php
    $hero = file_exists(public_path($image)) ? asset($image) : null;
@endphp

<x-guest-layout>
    <x-slot:pageTitle>{{ $pageTitle ?? $title }}</x-slot:pageTitle>

    <div class="min-h-screen lg:h-screen">
        <div class="relative grid h-full min-h-screen lg:min-h-0 overflow-hidden bg-white lg:grid-cols-2">

            {{-- ============ LEFT: form ============ --}}
            <div class="relative flex flex-col lg:overflow-y-auto {{ $reverse ? 'lg:order-2' : '' }}">
                {{-- Same soft glows as the card pages (mirrored when reversed) --}}
                <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden {{ $reverse ? '-scale-x-100' : '' }}">
                    <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[radial-gradient(circle,_#fbd5d5_0%,_transparent_65%)] opacity-60"></div>
                    <div class="absolute -bottom-40 -right-32 h-96 w-96 rounded-full bg-[radial-gradient(circle,_#dbe5f3_0%,_transparent_65%)] opacity-70"></div>
                </div>

                <x-auth-wave />

                <div class="relative flex flex-1 items-center justify-center px-6 pt-8 pb-24 sm:px-12 lg:pt-5 lg:pb-20">
                    <div class="auth-rise w-full {{ $compact ? 'max-w-[460px]' : 'max-w-[400px]' }}">
                        <a href="{{ url('/') }}" class="mx-auto block w-fit">
                            {{-- One logo size on every auth page --}}
                            <img src="{{ asset('images/amalogo-trim.png') }}" alt="Amaryllis Cove Resorts"
                                 class="h-20 xl:h-24 [@media(max-height:820px)]:h-20 w-auto">
                        </a>

                        <div class="mt-4 text-center [@media(max-height:820px)]:mt-2">
                            <h1 class="font-display text-3xl xl:text-4xl font-bold text-[#1d3b6e]">{{ $title }}</h1>
                            @if ($subtitle)
                                <p class="mx-auto mt-1 max-w-sm text-[15px] text-slate-500">{{ $subtitle }}</p>
                            @endif
                        </div>

                        <x-auth-alerts />

                        {{ $slot }}
                    </div>
                </div>
            </div>

            {{-- ============ RIGHT: resort showcase ============ --}}
            <aside class="relative hidden lg:block overflow-hidden bg-[#1d3b6e]">
                @if ($hero)
                    <img src="{{ $hero }}" alt="{{ $imageAlt }}"
                         class="auth-hero absolute inset-0 h-full w-full object-cover {{ $imagePosition }}">
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f2547]/55 via-transparent to-[#0f2547]/55"></div>

                {{-- Top navigation --}}
                <nav class="absolute inset-x-0 top-0 flex items-center justify-between gap-4 px-8 pt-7 text-white">
                    <div class="flex items-center gap-1 text-sm font-medium">
                        <a href="{{ url('/') }}" aria-label="Home" class="mr-2 grid h-10 w-10 place-items-center rounded-full bg-[#9b111e] shadow-lg transition hover:bg-[#7a0d17]">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M11.47 3.84a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 1-1.06 1.06l-.97-.97V19.5a1.5 1.5 0 0 1-1.5 1.5H15v-5.25a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0-.75.75V21H6.31a1.5 1.5 0 0 1-1.5-1.5v-6.88l-.97.97a.75.75 0 1 1-1.06-1.06l8.69-8.69Z"/></svg>
                        </a>
                        @foreach (['Rooms' => '/#rooms', 'Amenities' => '/#amenities', 'About' => '/#about', 'Contact' => '/#contact'] as $label => $href)
                            <span class="h-4 w-px bg-white/40"></span>
                            <a href="{{ url($href) }}" class="rounded-md px-3 py-1.5 transition hover:bg-white/10">{{ $label }}</a>
                        @endforeach
                    </div>
                    <a href="{{ Route::has('register') ? route('register') : url('/') }}"
                       class="flex shrink-0 items-center gap-2 rounded-full border border-white/80 px-4 py-2 text-sm font-medium backdrop-blur-sm transition hover:bg-white hover:text-[#1d3b6e]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                        Book Now
                    </a>
                </nav>

                @isset($showcase)
                    {{ $showcase }}
                @else
                {{-- Perks bar --}}
                <div class="absolute inset-x-8 bottom-7 flex items-center justify-around rounded-2xl bg-white/10 px-4 py-3.5 text-sm text-white ring-1 ring-white/20 backdrop-blur-md">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75V6m0 6h19.5m0 6.75V12m-19.5 3.75h19.5M6 9.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm4.5 2.25V9a1.5 1.5 0 0 1 1.5-1.5h6.75a3 3 0 0 1 3 3V12"/></svg>
                        Luxurious Rooms
                    </div>
                    <span class="h-6 w-px bg-white/30"></span>
                    <div class="flex items-center gap-2.5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21V9m0 0c-1.5-2.5-4.5-3.5-7.5-2.5M12 9c1.5-2.5 4.5-3.5 7.5-2.5M12 9C11 6 8.5 4 5.5 4M12 9c1-3 3.5-5 6.5-5M12 9c-2 .5-4 2.5-4.5 5M12 9c2 .5 4 2.5 4.5 5M8 21h8"/></svg>
                        Beachfront View
                    </div>
                    <span class="h-6 w-px bg-white/30"></span>
                    <div class="flex items-center gap-2.5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20c-4.5 0-8-2.5-9-6 2.5-.5 5 0 7 1.5M12 20c4.5 0 8-2.5 9-6-2.5-.5-5 0-7 1.5M12 20c-2-2-3-4.5-3-7.5S10.5 6 12 4c1.5 2 3 5.5 3 8.5S14 18 12 20Z"/></svg>
                        World-Class Service
                    </div>
                </div>
                @endisset
            </aside>
        </div>
    </div>
</x-guest-layout>
