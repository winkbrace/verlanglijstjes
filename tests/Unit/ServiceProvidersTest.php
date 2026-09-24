<?php declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Tests\TestCase;

class ServiceProvidersTest extends TestCase
{
    public function test_all_default_framework_providers_are_configured(): void
    {
        $configured = config('app.providers');

        foreach (ServiceProvider::defaultProviders()->toArray() as $provider) {
            $this->assertContains($provider, $configured);
        }
    }

    public function test_only_the_app_service_provider_is_registered_by_the_app(): void
    {
        $this->assertSame([\App\Providers\AppServiceProvider::class], require base_path('bootstrap/providers.php'));
    }

    public function test_registered_event_sends_email_verification(): void
    {
        Event::fake();

        Event::assertListening(Registered::class, SendEmailVerificationNotification::class);
    }
}
