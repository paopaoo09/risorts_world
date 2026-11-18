<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    /**
     * Send the user to Google's sign-in page.
     */
    public function redirect(): RedirectResponse
    {
        if (! config('services.google.client_id') || ! config('services.google.client_secret')) {
            return redirect()->route('login')->withErrors([
                'email' => 'Google sign-in is not set up yet. Please use your email and password.',
            ]);
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Google sends the user back here after they sign in.
     */
    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            report($e);

            return redirect()->route('login')->withErrors([
                'email' => 'Google sign-in failed. Please try again.',
            ]);
        }

        if (! $googleUser->getEmail()) {
            return redirect()->route('login')->withErrors([
                'email' => 'Your Google account did not share an email address.',
            ]);
        }

        // 1. Returning Google user, 2. existing account with the same email, 3. new customer.
        $user = User::where('google_id', $googleUser->getId())->first()
            ?? User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            if (! $user->google_id) {
                $user->forceFill(['google_id' => $googleUser->getId()])->save();
            }
        } else {
            $user = User::create([
                'full_name' => $googleUser->getName() ?: Str::before($googleUser->getEmail(), '@'),
                'username' => $this->uniqueUsername($googleUser->getEmail()),
                'email' => $googleUser->getEmail(),
                'password' => Str::password(32), // unusable random password; they sign in with Google
                'role' => User::ROLE_CUSTOMER,
            ]);

            $user->forceFill([
                'google_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ])->save();
        }

        Auth::login($user, remember: true);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Build a unique username from the email, e.g. juan.delacruz, juan.delacruz1, ...
     */
    private function uniqueUsername(string $email): string
    {
        $base = Str::of($email)->before('@')->lower()->replaceMatches('/[^a-z0-9._]/', '')->limit(40, '')->value() ?: 'guest';
        $username = $base;
        $i = 1;

        while (User::where('username', $username)->exists()) {
            $username = $base.$i++;
        }

        return $username;
    }
}
