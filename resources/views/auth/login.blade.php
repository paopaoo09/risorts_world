<x-auth-shell title="Welcome back" page-title="Sign In" subtitle="Please enter your account details">
    <form method="POST" action="{{ route('login') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-6 space-y-4 [@media(max-height:820px)]:mt-4 [@media(max-height:820px)]:space-y-3">
        @csrf

        <div>
            <x-auth-label for="email" icon="mail">Email</x-auth-label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="you@example.com" class="auth-input">
        </div>

        <x-auth-password />

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-700">
                <input id="remember_me" type="checkbox" name="remember" class="auth-checkbox">
                Keep me logged in
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link text-sm">Forgot Password?</a>
            @endif
        </div>

        <x-auth-submit busy-text="Signing in…">Sign In</x-auth-submit>
    </form>

    <x-auth-google />

    @if (Route::has('register'))
        <p class="mt-5 text-center text-sm text-slate-700 [@media(max-height:820px)]:mt-3">
            Don't have an account?
            <a href="{{ route('register') }}" class="auth-link font-semibold">Sign Up</a>
        </p>
    @endif
</x-auth-shell>
