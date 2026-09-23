<?php declare(strict_types=1);

namespace Tests\Unit;

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
}
