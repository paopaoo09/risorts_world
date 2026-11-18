{{-- Field label with a small icon. icon: mail | lock | user | at | key | shield --}}
@props(['for', 'icon' => null])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'auth-label']) }}>
    @switch($icon)
        @case('mail')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.93 5.5a3 3 0 0 1-3.14 0L1.5 8.67Z"/><path d="M22.5 6.91V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.16l9.71 5.98a1.5 1.5 0 0 0 1.58 0l9.71-5.98Z"/></svg>
            @break
        @case('lock')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3A5.25 5.25 0 0 0 12 1.5Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd"/></svg>
            @break
        @case('user')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.75 20.1a8.25 8.25 0 0 1 16.5 0 .75.75 0 0 1-.44.68A18.7 18.7 0 0 1 12 22.5c-2.79 0-5.43-.61-7.81-1.72a.75.75 0 0 1-.44-.68Z" clip-rule="evenodd"/></svg>
            @break
        @case('at')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.66 1 3 2.25 3S21 13.66 21 12a9 9 0 1 0-2.64 6.36"/></svg>
            @break
        @case('key')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 0 0-6.65 7.93c.06.35-.04.68-.25.89l-6.63 6.62a2.25 2.25 0 0 0-.65 1.6v2.71c0 .41.34.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19v-1.5h1.5a.75.75 0 0 0 .53-.22l1.66-1.66c.21-.21.54-.31.89-.25A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd"/></svg>
            @break
        @case('shield')
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.52 2.17a.75.75 0 0 0-1.04 0 11.2 11.2 0 0 1-7.88 3.08.75.75 0 0 0-.72.52A12.7 12.7 0 0 0 2.25 9.75c0 5.94 4.06 10.92 9.56 12.33.12.03.25.03.38 0 5.5-1.41 9.56-6.4 9.56-12.33 0-1.39-.22-2.73-.64-3.98a.75.75 0 0 0-.72-.52h-.15a11.2 11.2 0 0 1-7.72-3.08Zm3.09 8.02a.75.75 0 0 0-1.22-.88l-3.24 4.53-1.62-1.62a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.1l3.75-5.24Z" clip-rule="evenodd"/></svg>
            @break
    @endswitch
    {{ $slot }}
</label>
