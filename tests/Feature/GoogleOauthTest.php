<?php declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery;
use Tests\TestCase;
use Verlanglijstjes\User;

class GoogleOauthTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_sends_user_to_google(): void
    {
        config([
            'services.google.client_id' => 'test-client-id',
            'services.google.client_secret' => 'test-client-secret',
            'services.google.redirect' => 'http://localhost/oauth/google/callback',
        ]);

        $response = $this->get(route('oauth.google.redirect'));

        $response->assertRedirect();
        $this->assertStringStartsWith('https://accounts.google.com/', $response->headers->get('Location'));
    }

    public function test_callback_creates_and_logs_in_a_guest_user(): void
    {
        $this->mockGoogleUser((new SocialiteUser())->map([
            'id' => 'google-123',
            'name' => 'Test Persoon',
            'email' => 'test.persoon@example.com',
            'avatar' => 'https://example.com/avatar.png',
        ]));

        $this->get(route('oauth.google.callback'))->assertRedirect(route('home'));

        $user = User::where('google_id', 'google-123')->firstOrFail();
        $this->assertSame('Test Persoon (test.persoon@example.com)', $user->name);
        $this->assertSame(0, $user->generation);
        $this->assertTrue($user->isGuest());
        $this->assertAuthenticated();
    }

    public function test_failing_google_login_redirects_home_with_error(): void
    {
        Socialite::shouldReceive('driver->user')->andThrow(new \RuntimeException('invalid state'));

        $this->get(route('oauth.google.callback'))
            ->assertRedirect(route('home'))
            ->assertSessionHas('error');

        $this->assertGuest();
    }

    private function mockGoogleUser(SocialiteUser $googleUser): void
    {
        $provider = Mockery::mock(\Laravel\Socialite\Contracts\Provider::class);
        $provider->shouldReceive('user')->andReturn($googleUser);
        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);
    }
}
