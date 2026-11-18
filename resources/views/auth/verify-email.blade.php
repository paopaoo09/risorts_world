<x-auth-shell title="Verify your email" subtitle="We've sent a verification link to your email. Click it to activate your account and start booking.">
    <div class="mx-auto mt-6 grid h-16 w-16 place-items-center rounded-full bg-[#1d3b6e]/10 text-[#1d3b6e]">
        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/></svg>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-5 rounded-2xl bg-green-50 px-4 py-2.5 text-center text-sm font-medium text-green-700">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mt-6">
        @csrf
        <button type="submit" class="auth-btn">Resend Verification Email</button>
    </form>

    <p class="mt-3 text-center text-sm text-slate-500">Didn't get it? Check your spam folder first.</p>

    <div class="mt-6 flex items-center justify-center gap-4 text-sm">
        <a href="{{ route('profile.show') }}" class="auth-link">Edit Profile</a>
        <span class="h-4 w-px bg-slate-300"></span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-link">Log Out</button>
        </form>
    </div>
</x-auth-shell>
