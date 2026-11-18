<x-auth-shell title="Create your account" page-title="Sign Up" subtitle="Join us and start planning your stay" compact reverse
              image="images/signup-hero.jpg" image-position="object-[center_30%]"
              image-alt="Sun loungers and umbrellas on the white sand of a sheltered turquoise cove">
    <x-slot:showcase>
        <div class="absolute inset-x-8 bottom-8 xl:inset-x-12 xl:bottom-12">
            <div class="max-w-md rounded-3xl bg-[#0f2547]/55 p-7 text-white ring-1 ring-white/20 backdrop-blur-md">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#ffb4b4]">Member benefits</p>
                <h2 class="font-display mt-2 text-2xl xl:text-3xl font-bold leading-snug">Your getaway, made effortless.</h2>

                <ul class="mt-5 space-y-4 text-sm">
                    @foreach ([
                        ['Faster booking', 'Your details are saved, so reserving a room takes a minute.', 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z'],
                        ['All your stays in one place', 'View, change or cancel reservations anytime.', 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5'],
                        ['Packages & amenities', 'Add resort amenities and stay packages to any booking.', 'M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z'],
                    ] as [$heading, $text, $icon])
                        <li class="flex gap-3.5">
                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#9b111e]">
                                <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                            </span>
                            <span>
                                <span class="block font-semibold">{{ $heading }}</span>
                                <span class="block text-white/75">{{ $text }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-slot:showcase>

    <form method="POST" action="{{ route('register') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-5 space-y-3.5 [@media(max-height:820px)]:mt-3 [@media(max-height:820px)]:space-y-2.5">
        @csrf

        <div class="grid gap-3.5 sm:grid-cols-2">
            <div>
                <x-auth-label for="full_name" icon="user">Full Name</x-auth-label>
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required autofocus autocomplete="name"
                       placeholder="Juan Dela Cruz" class="auth-input">
            </div>
            <div>
                <x-auth-label for="username" icon="at">Username</x-auth-label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="nickname"
                       placeholder="juandc" class="auth-input">
            </div>
        </div>

        <div>
            <x-auth-label for="email" icon="mail">Email</x-auth-label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   placeholder="you@example.com" class="auth-input">
        </div>

        <div class="grid gap-3.5 sm:grid-cols-2">
            <x-auth-password autocomplete="new-password" placeholder="Create a password" />
            <x-auth-password id="password_confirmation" name="password_confirmation" label="Confirm Password"
                             autocomplete="new-password" placeholder="Repeat password" />
        </div>
        <p class="!mt-1.5 pl-5 text-xs text-slate-400">Use at least 8 characters.</p>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <label for="terms" class="flex items-start gap-2 text-sm text-slate-700">
                <input id="terms" type="checkbox" name="terms" required class="auth-checkbox mt-0.5">
                <span>
                    I agree to the
                    <a target="_blank" href="{{ route('terms.show') }}" class="auth-link">Terms of Service</a>
                    and
                    <a target="_blank" href="{{ route('policy.show') }}" class="auth-link">Privacy Policy</a>
                </span>
            </label>
        @endif

        <x-auth-submit busy-text="Creating your account…" class="!mt-4">Create Account</x-auth-submit>
    </form>

    <x-auth-google label="Sign up with Google" />

    <p class="mt-5 text-center text-sm text-slate-700 [@media(max-height:820px)]:mt-3">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-link font-semibold">Sign In</a>
    </p>
</x-auth-shell>
