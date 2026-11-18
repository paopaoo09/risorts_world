{{-- Password field with show/hide eye toggle. --}}
@props([
    'id' => 'password',
    'name' => 'password',
    'label' => 'Password',
    'autocomplete' => 'current-password',
    'placeholder' => 'Enter your password',
])

<div x-data="{ show: false }">
    <x-auth-label :for="$id" icon="lock">{{ $label }}</x-auth-label>
    <div class="relative mt-1.5">
        <input id="{{ $id }}" name="{{ $name }}" :type="show ? 'text' : 'password'" type="password" required
               autocomplete="{{ $autocomplete }}" placeholder="{{ $placeholder }}"
               {{ $attributes->merge(['class' => 'auth-input !mt-0 pr-12']) }}>
        <button type="button" @click="show = !show" :aria-label="show ? 'Hide password' : 'Show password'"
                class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full p-1.5 text-[#1d3b6e]/70 hover:text-[#1d3b6e]">
            <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.22A10.48 10.48 0 0 0 1.93 12C3.22 16.34 7.24 19.5 12 19.5c.99 0 1.95-.14 2.86-.4M6.23 6.23A10.45 10.45 0 0 1 12 4.5c4.76 0 8.77 3.16 10.07 7.5a10.52 10.52 0 0 1-4.29 5.77M6.23 6.23 3 3m3.23 3.23 3.65 3.65m7.89 7.89L21 21m-3.23-3.23-3.65-3.65m0 0a3 3 0 1 0-4.24-4.24m4.24 4.24L9.88 9.88"/></svg>
            <svg x-show="show" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.04 12.32a1 1 0 0 1 0-.64C3.42 7.51 7.36 4.5 12 4.5c4.64 0 8.57 3.01 9.96 7.18.07.2.07.43 0 .64C20.58 16.49 16.64 19.5 12 19.5c-4.64 0-8.57-3.01-9.96-7.18Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
        </button>
    </div>
</div>
