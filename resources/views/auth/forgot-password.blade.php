<x-auth-card title="Forgot your password?" page-title="Forgot Password" icon="key" step="1"
             subtitle="No worries. Enter the email on your account and we'll send you a link to reset it.">
    <form method="POST" action="{{ route('password.email') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-6 space-y-5">
        @csrf

        <div>
            <x-auth-label for="email" icon="mail">Email</x-auth-label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="you@example.com" class="auth-input">
        </div>

        <x-auth-submit busy-text="Sending link…" :arrow="false">Send Reset Link</x-auth-submit>
    </form>

    <x-slot:footer>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 font-medium text-[#1d3b6e] hover:text-[#9b111e]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Back to Sign In
        </a>
    </x-slot:footer>
</x-auth-card>
