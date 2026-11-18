<x-auth-card title="Two-step verification" page-title="Verify Sign In" icon="shield">
    <div x-data="{ recovery: false, busy: false }">
        <p class="mx-auto mt-2 max-w-sm text-center text-[15px] leading-relaxed text-slate-500" x-show="! recovery">
            Open your authenticator app and enter the 6-digit code for Amaryllis Cove.
        </p>
        <p class="mx-auto mt-2 max-w-sm text-center text-[15px] leading-relaxed text-slate-500" x-cloak x-show="recovery">
            Lost your device? Enter one of the emergency recovery codes you saved.
        </p>

        <form method="POST" action="{{ route('two-factor.login') }}" @submit="busy = true" class="mt-6 space-y-5">
            @csrf

            <div x-show="! recovery">
                <label for="code" class="sr-only">Authentication code</label>
                <input id="code" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code"
                       placeholder="000000" maxlength="6" pattern="[0-9]*"
                       class="block w-full rounded-2xl border-slate-300 py-4 text-center font-mono text-3xl tracking-[0.6em] text-[#1d3b6e] placeholder:text-slate-300 focus:border-[#1d3b6e] focus:ring-[#1d3b6e]">
            </div>

            <div x-cloak x-show="recovery">
                <x-auth-label for="recovery_code" icon="key">Recovery Code</x-auth-label>
                <input id="recovery_code" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code"
                       placeholder="xxxxxxxxxx-xxxxxxxxxx" class="auth-input font-mono">
            </div>

            <x-auth-submit busy-text="Verifying…" :arrow="false">Verify &amp; Sign In</x-auth-submit>
        </form>

        <div class="mt-5 text-center text-sm">
            <button type="button" class="auth-link" x-show="! recovery"
                    x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })">
                Use a recovery code instead
            </button>
            <button type="button" class="auth-link" x-cloak x-show="recovery"
                    x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                Use an authenticator code instead
            </button>
        </div>
    </div>

    <x-slot:footer>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 font-medium text-[#1d3b6e] hover:text-[#9b111e]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Back to Sign In
        </a>
    </x-slot:footer>
</x-auth-card>
