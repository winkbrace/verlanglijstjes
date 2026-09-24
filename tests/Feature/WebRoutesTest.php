<?php declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use Verlanglijstjes\User;

/**
 * Characterization tests that pin down routing, middleware and exception handling behaviour,
 * so the Laravel upgrade and the move to the slim skeleton can't silently change it.
 */
class WebRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_can_be_rendered(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_letters_page_can_be_rendered(): void
    {
        // avatarUrl() doesn't support users without avatar; in production every user has one
        User::factory()->create([
            'avatar' => '/var/www/html/public/img/avatar-test.svg',
        ]);

        $this->get('/letters')->assertOk();
    }

    public function test_wish_list_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $this->get(route('wish-list', ['name' => $user->name]))->assertOk();
    }

    public function test_wish_list_of_unknown_user_is_not_found(): void
    {
        $this->get(route('wish-list', ['name' => 'Niemand']))->assertNotFound();
    }

    public function test_auth_middleware_redirects_guests_to_login(): void
    {
        $this->get(route('add-wish'))->assertRedirect(route('login'));
    }

    public function test_not_guest_middleware_redirects_gast_account_to_home(): void
    {
        $gast = User::factory()->create(['name' => 'Gast']);

        $this->actingAs($gast)
            ->get(route('add-wish'))
            ->assertRedirect(route('home'))
            ->assertSessionHas('error');
    }

    public function test_not_guest_middleware_redirects_google_user_to_home(): void
    {
        $googleUser = User::factory()->create(['google_id' => '1234567890']);

        $this->actingAs($googleUser)
            ->get(route('add-wish'))
            ->assertRedirect(route('home'))
            ->assertSessionHas('error');
    }

    public function test_regular_user_can_open_add_wish_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('add-wish'))->assertOk();
    }

    public function test_guest_middleware_redirects_logged_in_user_to_home(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('login'))->assertRedirect('/');
    }

    public function test_user_not_logged_in_exception_is_rendered_as_403_view(): void
    {
        Route::middleware('web')->get('/_test/user-not-logged-in', fn () => user());

        $response = $this->get('/_test/user-not-logged-in');

        // The exception handler renders view('errors.403'), which doesn't exist yet (see README TODO),
        // so for now this results in a 500. This test pins that the handler takes over UserNotLoggedIn.
        $response->assertStatus(500);
        $this->assertInstanceOf(\InvalidArgumentException::class, $response->exception);
        $this->assertSame('View [errors.403] not found.', $response->exception->getMessage());
    }

    public function test_input_is_trimmed_except_passwords(): void
    {
        Route::middleware('web')->post('/_test/trim', fn () => request()->only('name', 'password', 'password_confirmation'));

        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class)
            ->post('/_test/trim', ['name' => '  Bas  ', 'password' => '  geheim  ', 'password_confirmation' => '  geheim  '])
            ->assertExactJson(['name' => 'Bas', 'password' => '  geheim  ', 'password_confirmation' => '  geheim  ']);
    }
}
