{{--
    Primary submit button with a loading state.
    Put x-data="{ busy: false }" @submit="busy = true" on the <form>.
--}}
@props(['busyText' => 'Please wait…', 'arrow' => true])

<button type="submit" :disabled="busy" {{ $attributes->merge(['class' => 'auth-btn group']) }}>
    <svg x-show="busy" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-opacity=".3" stroke-width="3"/>
        <path d="M22 12a10 10 0 0 0-10-10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
    </svg>
    <span x-show="!busy">{{ $slot }}</span>
    <span x-show="busy" x-cloak>{{ $busyText }}</span>
    @if ($arrow)
        <svg x-show="!busy" class="h-4 w-4 transition group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/></svg>
    @endif
</button>
