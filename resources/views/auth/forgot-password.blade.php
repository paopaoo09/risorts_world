<x-auth-shell title="Forgot password?" subtitle="Enter the email on your account and we'll send you a link to reset your password.">
    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
        @csrf

        <div>
            <x-auth-label for="email" icon="mail">Email</x-auth-label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="you@example.com" class="auth-input">
        </div>

        <button type="submit" class="auth-btn">Send Reset Link</button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-700">
        <a href="{{ route('login') }}" class="auth-link inline-flex items-center gap-1 font-semibold">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Back to Sign In
        </a>
    </p>
</x-auth-shell>
