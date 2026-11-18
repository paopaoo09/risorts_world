<x-auth-card title="Confirm it's you" page-title="Confirm Password" icon="lock"
             subtitle="You're entering a secure area. Please re-enter your password to continue.">
    <div class="mt-5 flex items-center gap-3 rounded-2xl bg-slate-50 px-4 py-3 text-sm text-slate-600">
        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#1d3b6e] text-sm font-semibold text-white">
            {{ Str::upper(Str::substr(Auth::user()->full_name, 0, 1)) }}
        </span>
        <span class="min-w-0">
            <span class="block truncate font-medium text-slate-800">{{ Auth::user()->full_name }}</span>
            <span class="block truncate text-xs">{{ Auth::user()->email }}</span>
        </span>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" x-data="{ busy: false }" @submit="busy = true" class="mt-5 space-y-5">
        @csrf
        <x-auth-password autofocus />
        <x-auth-submit busy-text="Checking…" :arrow="false">Confirm</x-auth-submit>
    </form>

    <x-slot:footer>
        <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('dashboard') }}"
           class="inline-flex items-center gap-1 font-medium text-[#1d3b6e] hover:text-[#9b111e]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            Cancel and go back
        </a>
    </x-slot:footer>
</x-auth-card>
