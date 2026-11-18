<x-auth-card title="Check your inbox" page-title="Verify Email" icon="mail">
    <p class="mx-auto mt-2 max-w-sm text-center text-[15px] leading-relaxed text-slate-500">
        We sent a verification link to
        <span class="font-semibold text-slate-800">{{ Auth::user()->email }}</span>.
        Click it to activate your account and start booking your stay.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div role="status" class="mt-5 rounded-2xl border border-green-600/20 bg-green-50 px-4 py-3 text-center text-sm text-green-800">
            A new verification link is on its way.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-6">
        @csrf
        <x-auth-submit busy-text="Sending…" :arrow="false">Resend Verification Email</x-auth-submit>
    </form>

    <ul class="mt-6 space-y-2 rounded-2xl bg-slate-50 px-5 py-4 text-sm text-slate-600">
        <li class="flex gap-2"><span class="text-[#9b111e]">&bull;</span> Check your spam or promotions folder.</li>
        <li class="flex gap-2"><span class="text-[#9b111e]">&bull;</span> The link expires after 60 minutes.</li>
        <li class="flex gap-2"><span class="text-[#9b111e]">&bull;</span> Wrong email? Update it in your profile.</li>
    </ul>

    <x-slot:footer>
        <div class="flex items-center justify-center gap-4">
            <a href="{{ route('profile.show') }}" class="font-medium text-[#1d3b6e] hover:text-[#9b111e]">Edit Profile</a>
            <span class="h-4 w-px bg-slate-300"></span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="font-medium text-[#1d3b6e] hover:text-[#9b111e]">Log Out</button>
            </form>
        </div>
    </x-slot:footer>
</x-auth-card>
