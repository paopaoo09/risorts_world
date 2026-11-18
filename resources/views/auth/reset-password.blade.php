<x-auth-shell title="Set a new password" subtitle="Choose a strong password you haven't used before.">
    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-auth-label for="email" icon="mail">Email</x-auth-label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="username"
                   placeholder="you@example.com" class="auth-input">
        </div>

        <x-auth-password label="New Password" autocomplete="new-password" placeholder="Create a new password" autofocus />
        <x-auth-password id="password_confirmation" name="password_confirmation" label="Confirm New Password"
                         autocomplete="new-password" placeholder="Repeat the new password" />

        <button type="submit" class="auth-btn !mt-6">Reset Password</button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-700">
        <a href="{{ route('login') }}" class="auth-link inline-flex items-center gap-1 font-semibold">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Back to Sign In
        </a>
    </p>
</x-auth-shell>
