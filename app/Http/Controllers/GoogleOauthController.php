<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Verlanglijstjes\User;

/**
 * This controller uses Laravel Socialite to handle OAuth2 SSO authentication.
 */
class GoogleOauthController extends Controller
{
    /**
     * Redirect the user to Google’s OAuth page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function callback()
    {
        try {
            // Get the user information from Google
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable) {
            return redirect()->route('home')->with('error', 'Google authentication failed.');
        }

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'avatar' => $googleUser->avatar,
            // required dummy values
            'password' => bcrypt(Str::random()), // Set a random password
            'birth_date' => '1970-01-01',
            'generation' => 0,
            'position' => 0,
            'chocolate_preference' => 'Google',
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
