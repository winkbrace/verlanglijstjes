<?php

namespace Tests\Feature\Auth;

use Verlanglijstjes\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        $user = User::factory()->create();

        $this->requestResetPasswordNotification($user);
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $notification = $this->requestResetPasswordNotification($user);

        $response = $this->get('/reset-password/'.$notification->token);

        $response->assertStatus(200);
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        $user = User::factory()->create();

        $notification = $this->requestResetPasswordNotification($user);

        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Notification::fake() can't be used, because it indexes by $user->getKey(), which is a UserId object.
     * Instead, the notification is actually sent (to the array mailer) and captured from the NotificationSent event.
     */
    private function requestResetPasswordNotification(User $user): ResetPassword
    {
        $sent = [];
        Event::listen(NotificationSent::class, function (NotificationSent $event) use (&$sent) {
            $sent[] = $event;
        });

        $this->post('/forgot-password', ['email' => $user->email]);

        $this->assertCount(1, $sent);
        $this->assertTrue($sent[0]->notifiable->id->equals($user->id));
        $this->assertInstanceOf(ResetPassword::class, $sent[0]->notification);

        return $sent[0]->notification;
    }
}
