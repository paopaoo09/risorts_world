<x-auth-card title="Set a new password" page-title="Reset Password" icon="reset" step="2"
             subtitle="Almost done. Choose a strong password you haven't used before.">
    <form method="POST" action="{{ route('password.update') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-6 space-y-4">
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
        <p class="!mt-1.5 pl-5 text-xs text-slate-400">Use at least 8 characters.</p>

        <x-auth-submit busy-text="Saving…" :arrow="false" class="!mt-6">Reset Password</x-auth-submit>
    </form>

    <x-slot:footer>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 font-medium text-[#1d3b6e] hover:text-[#9b111e]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Back to Sign In
        </a>
    </x-slot:footer>
</x-auth-card>
