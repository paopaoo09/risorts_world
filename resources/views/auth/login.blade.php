<x-guest-layout>
    <div class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-8 sm:py-12">
        <div class="w-full max-w-6xl bg-white rounded-3xl shadow-xl overflow-hidden grid lg:grid-cols-2 min-h-[600px]">

            {{-- Left: sign-in form --}}
            <div class="flex flex-col px-6 py-8 sm:px-12 lg:px-16">
                <a href="{{ url('/') }}" class="inline-block w-fit">
                    <img src="{{ asset('images/amalogo.png') }}" alt="Amaryllis Cove Resorts" class="h-14 w-auto">
                </a>

                <div class="flex-1 flex items-center">
                    <div class="w-full max-w-md mx-auto py-8">
                        <h1 class="text-3xl font-semibold text-slate-900">Welcome back</h1>
                        <p class="mt-2 text-sm text-slate-500">Please enter your account details</p>

                        <x-validation-errors class="mt-6" />

                        @session('status')
                            <div class="mt-6 rounded-lg bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                                {{ $value }}
                            </div>
                        @endsession

                        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                            @csrf

                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                       placeholder="you@example.com"
                                       class="mt-1.5 block w-full rounded-full border-slate-300 bg-slate-50 px-5 py-3 text-slate-900 placeholder-slate-400 focus:border-[#1d3b6e] focus:bg-white focus:ring-[#1d3b6e]">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                       placeholder="••••••••"
                                       class="mt-1.5 block w-full rounded-full border-slate-300 bg-slate-50 px-5 py-3 text-slate-900 placeholder-slate-400 focus:border-[#1d3b6e] focus:bg-white focus:ring-[#1d3b6e]">
                            </div>

                            <div class="flex items-center justify-between">
                                <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-600">
                                    <input id="remember_me" type="checkbox" name="remember"
                                           class="rounded border-slate-300 text-[#1d3b6e] focus:ring-[#1d3b6e]">
                                    Keep me logged in
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#1d3b6e] hover:underline">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit"
                                    class="w-full rounded-full bg-[#1d3b6e] px-5 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-[#152c54] focus:outline-none focus:ring-2 focus:ring-[#1d3b6e] focus:ring-offset-2">
                                Sign In
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="my-6 flex items-center gap-4">
                            <div class="h-px flex-1 bg-slate-200"></div>
                            <span class="text-xs font-medium uppercase tracking-wider text-slate-400">or</span>
                            <div class="h-px flex-1 bg-slate-200"></div>
                        </div>

                        {{-- Google sign-in --}}
                        <a href="{{ route('auth.google') }}"
                           class="flex w-full items-center justify-center gap-3 rounded-full border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2">
                            <svg class="h-5 w-5" viewBox="0 0 48 48" aria-hidden="true">
                                <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.4-.4-3.5z"/>
                                <path fill="#FF3D00" d="m6.3 14.7 6.6 4.8C14.7 15.1 19 12 24 12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34 6.1 29.3 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/>
                                <path fill="#4CAF50" d="M24 44c5.2 0 9.9-2 13.4-5.2l-6.2-5.2C29.2 35.1 26.7 36 24 36c-5.2 0-9.6-3.3-11.3-7.9l-6.5 5C9.5 39.6 16.2 44 24 44z"/>
                                <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.2-2.2 4.2-4.1 5.6l6.2 5.2C37 39.2 44 34 44 24c0-1.3-.1-2.4-.4-3.5z"/>
                            </svg>
                            Sign in with Google
                        </a>

                        @if (Route::has('register'))
                            <p class="mt-8 text-center text-sm text-slate-600">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="font-semibold text-[#1d3b6e] hover:underline">Sign up</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right: resort visual. Swap the gradient for a photo by adding
                 bg-[url('/images/your-photo.jpg')] bg-cover bg-center to this div. --}}
            <div class="relative hidden lg:flex items-end bg-gradient-to-br from-[#1d3b6e] via-[#24508f] to-[#0f2547] p-12">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                <div class="relative text-white">
                    <p class="text-sm font-medium uppercase tracking-[0.2em] text-white/70">Amaryllis Cove Resorts</p>
                    <h2 class="mt-3 text-4xl font-semibold leading-tight" style="font-family: Georgia, 'Times New Roman', serif;">
                        Your escape to the<br>coast starts here.
                    </h2>
                    <p class="mt-4 max-w-sm text-white/80">
                        Book rooms, amenities and packages, and manage your stays in one place.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
