{{--
    One-column, photo-free layout for the account-security pages
    (forgot / reset / confirm password, two-factor, verify email).

    Usage:
    <x-auth-card title="Forgot password?" subtitle="..." icon="key" step="1">
        form here
        <x-slot:footer> links under the card </x-slot:footer>
    </x-auth-card>

    icon: key | lock | shield | mail | reset
    step: 1 or 2 shows a "Step x of 2" indicator for the password-reset flow.
--}}
@props(['title', 'pageTitle' => null, 'subtitle' => null, 'icon' => 'lock', 'step' => null])

<x-guest-layout>
    <x-slot:pageTitle>{{ $pageTitle ?? $title }}</x-slot:pageTitle>

    <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-[#f6f3f0] px-4 pt-10 pb-28">
        {{-- Same soft glows as login / sign up --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[radial-gradient(circle,_#fbd5d5_0%,_transparent_65%)] opacity-60"></div>
            <div class="absolute -bottom-40 -right-32 h-96 w-96 rounded-full bg-[radial-gradient(circle,_#dbe5f3_0%,_transparent_65%)] opacity-70"></div>
        </div>

        <x-auth-wave />

        <a href="{{ url('/') }}" class="auth-rise relative mb-6 block">
            <img src="{{ asset('images/amalogo-trim.png') }}" alt="Amaryllis Cove Resorts" class="h-20 xl:h-24 [@media(max-height:820px)]:h-20 w-auto">
        </a>

        <div class="auth-rise relative w-full max-w-md rounded-3xl bg-white p-7 text-center shadow-[0_20px_50px_-20px_rgba(29,59,110,0.35)] ring-1 ring-slate-900/5 sm:p-9">
            @if ($step)
                <div class="mb-5 flex items-center justify-center gap-2 text-xs font-medium text-slate-400">
                    <span class="h-1.5 w-8 rounded-full {{ $step >= 1 ? 'bg-[#9b111e]' : 'bg-slate-200' }}"></span>
                    <span class="h-1.5 w-8 rounded-full {{ $step >= 2 ? 'bg-[#9b111e]' : 'bg-slate-200' }}"></span>
                    <span class="ml-1">Step {{ $step }} of 2</span>
                </div>
            @endif

            {{-- Icon badge --}}
            <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-[#1d3b6e]/10 text-[#1d3b6e] ring-8 ring-[#1d3b6e]/5">
                @switch($icon)
                    @case('key')
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.03 5.91c-.56-.1-1.16.03-1.56.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.82c0-.6.24-1.17.66-1.59l6.42-6.42c.4-.4.52-1 .43-1.56A6 6 0 1 1 21.75 8.25Z"/></svg>
                        @break
                    @case('reset')
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16.02 9.35h4.99v-.01M2.99 19.64v-4.99m0 0h4.99m-4.99 0 3.18 3.18a8.25 8.25 0 0 0 13.8-3.7M4.03 9.87a8.25 8.25 0 0 1 13.8-3.7l3.18 3.18m0-4.99v4.99"/></svg>
                        @break
                    @case('shield')
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.04A11.96 11.96 0 0 1 3.6 6 11.99 11.99 0 0 0 3 9.75c0 5.59 3.82 10.29 9 11.62 5.18-1.33 9-6.03 9-11.62 0-1.31-.21-2.57-.6-3.75h-.15c-3.2 0-6.1-1.25-8.25-3.29Z"/></svg>
                        @break
                    @case('mail')
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.91a2.25 2.25 0 0 1-1.18 1.98l-6.48 3.49M2.25 9v.91a2.25 2.25 0 0 0 1.18 1.98l6.48 3.49m8.84 2.51-4.66-2.51m0 0-1.02-.55a2.25 2.25 0 0 0-2.14 0l-1.02.55m0 0-4.66 2.51m16.5 1.61a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.84a2.25 2.25 0 0 1 1.18-1.98l7.5-4.04a2.25 2.25 0 0 1 2.14 0l7.5 4.04a2.25 2.25 0 0 1 1.18 1.98V19.5Z"/></svg>
                        @break
                    @default
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                @endswitch
            </div>

            <h1 class="font-display mt-5 text-2xl sm:text-3xl font-bold text-[#1d3b6e]">{{ $title }}</h1>
            @if ($subtitle)
                <p class="mx-auto mt-2 max-w-sm text-[15px] leading-relaxed text-slate-500">{{ $subtitle }}</p>
            @endif

            <x-auth-alerts />

            <div class="text-left">
                {{ $slot }}
            </div>
        </div>

        @isset($footer)
            <div class="auth-rise relative mt-6 text-center text-sm">{{ $footer }}</div>
        @endisset

    </div>
</x-guest-layout>
