<x-auth-shell title="Confirm your password" subtitle="This is a secure area. Please confirm your password before continuing.">
    <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-5">
        @csrf

        <x-auth-password autofocus />

        <button type="submit" class="auth-btn">Confirm</button>
    </form>
</x-auth-shell>
