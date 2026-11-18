{{-- Error and success boxes shared by every auth page. --}}
@if ($errors->any())
    <div role="alert" class="mt-4 flex gap-3 rounded-2xl border border-[#9b111e]/20 bg-[#fdf2f2] px-4 py-3 text-left text-sm text-[#7a0d17]">
        <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"/></svg>
        <ul class="space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status') && session('status') !== 'verification-link-sent')
    <div role="status" class="mt-4 flex gap-3 rounded-2xl border border-green-600/20 bg-green-50 px-4 py-3 text-left text-sm text-green-800">
        <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.86-9.81a.75.75 0 0 0-1.22-.88l-3.24 4.53-1.62-1.62a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.1l3.75-5.24Z" clip-rule="evenodd"/></svg>
        {{ session('status') }}
    </div>
@endif
