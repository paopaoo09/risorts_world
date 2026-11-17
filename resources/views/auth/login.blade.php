@php
    // Drop a resort photo at public/images/login-hero.jpg and it is used automatically.
    $hero = file_exists(public_path('images/login-hero.jpg')) ? asset('images/login-hero.jpg') : null;
@endphp

<x-guest-layout>
    <div class="min-h-screen lg:h-screen lg:overflow-hidden grid lg:grid-cols-[minmax(0,5fr)_minmax(0,6fr)] bg-white">

        {{-- Left: sign-in form --}}
        <div class="flex flex-col px-6 py-6 sm:px-10 lg:px-14 xl:px-20 lg:overflow-y-auto">
            <header class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="inline-block">
                    <img src="{{ asset('images/amalogo.png') }}" alt="Amaryllis Cove Resorts" class="h-11 w-auto">
                </a>
                <a href="{{ url('/') }}" class="text-sm font-medium text-slate-500 hover:text-[#1d3b6e] transition">
                    &larr; Back to site
                </a>
            </header>

            <main class="flex-1 flex items-center">
                <div class="w-full max-w-sm mx-auto py-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#b5222f]">Guest sign in</p>
                    <h1 class="mt-2 text-3xl text-slate-900" style="font-family: Georgia, 'Times New Roman', serif;">Welcome back</h1>
                    <p class="mt-1.5 text-sm text-slate-500">Sign in to book your stay and manage your reservations.</p>

                    <x-validation-errors class="mt-4 text-sm" />

                    @session('status')
                        <div class="mt-4 rounded-lg bg-green-50 px-4 py-2.5 text-sm font-medium text-green-700">
                            {{ $value }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email address</label>
                            <div class="relative mt-1.5">
                                <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                </svg>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                       placeholder="you@example.com"
                                       class="block w-full rounded-lg border-slate-300 py-2.5 pl-10 pr-4 text-sm text-slate-900 placeholder-slate-400 shadow-sm focus:border-[#1d3b6e] focus:ring-[#1d3b6e]">
                            </div>
                        </div>

                        <div x-data="{ show: false }">
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-medium text-[#1d3b6e] hover:underline">Forgot password?</a>
                                @endif
                            </div>
                            <div class="relative mt-1.5">
                                <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                </svg>
                                <input id="password" :type="show ? 'text' : 'password'" type="password" name="password" required autocomplete="current-password"
                                       placeholder="Enter your password"
                                       class="block w-full rounded-lg border-slate-300 py-2.5 pl-10 pr-16 text-sm text-slate-900 placeholder-slate-400 shadow-sm focus:border-[#1d3b6e] focus:ring-[#1d3b6e]">
                                <button type="button" @click="show = !show"
                                        class="absolute right-2 top-1/2 -translate-y-1/2 rounded px-2 py-1 text-xs font-medium text-slate-500 hover:text-slate-800"
                                        x-text="show ? 'Hide' : 'Show'">Show</button>
                            </div>
                        </div>

                        <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-600">
                            <input id="remember_me" type="checkbox" name="remember"
                                   class="rounded border-slate-300 text-[#1d3b6e] focus:ring-[#1d3b6e]">
                            Keep me signed in
                        </label>

                        <button type="submit"
                                class="w-full rounded-lg bg-[#1d3b6e] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#152c54] focus:outline-none focus:ring-2 focus:ring-[#1d3b6e] focus:ring-offset-2">
                            Sign in
                        </button>
                    </form>

                    <div class="my-5 flex items-center gap-3">
                        <div class="h-px flex-1 bg-slate-200"></div>
                        <span class="text-xs text-slate-400">or continue with</span>
                        <div class="h-px flex-1 bg-slate-200"></div>
                    </div>

                    <a href="{{ route('auth.google') }}"
                       class="flex w-full items-center justify-center gap-3 rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2">
                        <svg class="h-5 w-5" viewBox="0 0 48 48" aria-hidden="true">
                            <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.4-.4-3.5z"/>
                            <path fill="#FF3D00" d="m6.3 14.7 6.6 4.8C14.7 15.1 19 12 24 12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/>
                            <path fill="#4CAF50" d="M24 44c5.2 0 9.9-2 13.4-5.2l-6.2-5.2C29.2 35.1 26.7 36 24 36c-5.2 0-9.6-3.3-11.3-7.9l-6.5 5C9.5 39.6 16.2 44 24 44z"/>
                            <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.2-2.2 4.2-4.1 5.6l6.2 5.2C37 39.2 44 34 44 24c0-1.3-.1-2.4-.4-3.5z"/>
                        </svg>
                        Google
                    </a>

                    @if (Route::has('register'))
                        <p class="mt-6 text-center text-sm text-slate-600">
                            New to Amaryllis Cove?
                            <a href="{{ route('register') }}" class="font-semibold text-[#1d3b6e] hover:underline">Create an account</a>
                        </p>
                    @endif
                </div>
            </main>

            <footer class="flex items-center justify-center gap-1.5 text-xs text-slate-400">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                </svg>
                Secure sign in &middot; &copy; {{ date('Y') }} Amaryllis Cove Resorts
            </footer>
        </div>

        {{-- Right: resort showcase --}}
        <aside class="relative hidden lg:block overflow-hidden bg-[#0f2547]">
            @if ($hero)
                <img src="{{ $hero }}" alt="" class="absolute inset-0 h-full w-full object-cover">
            @else
                {{-- Placeholder scene until a real photo is added --}}
                <div class="absolute inset-0 bg-gradient-to-b from-[#f6c27a] via-[#e78a6a] to-[#1d3b6e]"></div>
                <div class="absolute left-1/2 top-[38%] h-40 w-40 -translate-x-1/2 rounded-full bg-[#ffe3a8]/80 blur-[2px]"></div>
                <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 520" preserveAspectRatio="none" aria-hidden="true">
                    <path fill="#2a5a94" fill-opacity=".85" d="M0 220c160-40 320-40 480 0s320 40 480 0 320-40 480 0v300H0Z"/>
                    <path fill="#1d3b6e" d="M0 300c180-50 360-50 540 0s360 50 540 0 270-40 360-20v240H0Z"/>
                    <path fill="#0f2547" d="M0 390c200-40 400-40 600 0s400 40 600 0 180-25 240-15v145H0Z"/>
                </svg>
            @endif

            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1b36]/90 via-[#0b1b36]/30 to-transparent"></div>

            {{-- Rating badge --}}
            <div class="absolute right-8 top-8 flex items-center gap-3 rounded-xl bg-white/15 px-4 py-2.5 text-white backdrop-blur-md ring-1 ring-white/25">
                <div class="flex text-[#ffd166]">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 0 0 .95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 0 0-.36 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 0 0-1.17 0l-2.8 2.03c-.78.57-1.83-.2-1.53-1.12l1.07-3.29a1 1 0 0 0-.36-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 0 0 .95-.69l1.07-3.29Z"/></svg>
                    @endfor
                </div>
                <span class="text-sm font-medium">Beachfront resort</span>
            </div>

            <div class="absolute inset-x-0 bottom-0 p-10 xl:p-14 text-white">
                <h2 class="max-w-lg text-4xl xl:text-5xl leading-tight" style="font-family: Georgia, 'Times New Roman', serif;">
                    Wake up to the sound of the sea.
                </h2>
                <p class="mt-3 max-w-md text-white/80">
                    Rooms, villas, amenities and packages, all bookable in a few clicks.
                </p>

                <ul class="mt-8 grid max-w-xl grid-cols-3 gap-4 border-t border-white/20 pt-6 text-sm">
                    <li>
                        <p class="font-semibold">Best rate</p>
                        <p class="text-white/70">when you book direct</p>
                    </li>
                    <li>
                        <p class="font-semibold">Instant confirmation</p>
                        <p class="text-white/70">for every reservation</p>
                    </li>
                    <li>
                        <p class="font-semibold">Manage anytime</p>
                        <p class="text-white/70">view or change bookings</p>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</x-guest-layout>
