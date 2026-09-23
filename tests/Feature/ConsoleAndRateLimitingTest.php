<?php declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class ConsoleAndRateLimitingTest extends TestCase
{
    public function test_app_commands_are_registered(): void
    {
        $commands = array_keys(Artisan::all());

        $this->assertContains('fetch:link-previews', $commands);
        $this->assertContains('fetch:avatars', $commands);
        $this->assertContains('remind:to-update-list', $commands);
        $this->assertContains('inspire', $commands); // from routes/console.php
    }

    public function test_api_rate_limiter_is_configured(): void
    {
        $this->assertNotNull(RateLimiter::limiter('api'));
    }
}
