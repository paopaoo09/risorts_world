<x-auth-shell title="Two-step verification">
    <div x-data="{ recovery: false }">
        <p class="mt-1 text-center text-[15px] text-slate-500" x-show="! recovery">
            Enter the 6-digit code from your authenticator app.
        </p>
        <p class="text-center text-[15px] text-slate-500" x-cloak x-show="recovery">
            Enter one of your emergency recovery codes.
        </p>

        <form method="POST" action="{{ route('two-factor.login') }}" class="mt-6 space-y-5">
            @csrf

            <div x-show="! recovery">
                <x-auth-label for="code" icon="shield">Authentication Code</x-auth-label>
                <input id="code" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code"
                       placeholder="123 456" maxlength="7"
                       class="auth-input text-center text-lg tracking-[0.4em] placeholder:tracking-[0.4em]">
            </div>

            <div x-cloak x-show="recovery">
                <x-auth-label for="recovery_code" icon="key">Recovery Code</x-auth-label>
                <input id="recovery_code" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code"
                       placeholder="xxxxxxxxxx-xxxxxxxxxx" class="auth-input">
            </div>

            <button type="submit" class="auth-btn">Verify &amp; Sign In</button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-700">
            <button type="button" class="auth-link" x-show="! recovery"
                    x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })">
                Use a recovery code instead
            </button>
            <button type="button" class="auth-link" x-cloak x-show="recovery"
                    x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                Use an authentication code instead
            </button>
        </p>

        <p class="mt-3 text-center text-sm">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1 text-slate-500 hover:text-[#1d3b6e]">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to Sign In
            </a>
        </p>
    </div>
</x-auth-shell>
