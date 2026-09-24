<?php declare(strict_types=1);

use Illuminate\Contracts\Http\Kernel;
use Tests\TestCase;

/**
 * Pins the middleware configured in bootstrap/app.php, so the move from the Laravel 10 Kernel
 * to the slim skeleton (and later cleanups) can't silently change which middleware run.
 */
class MiddlewareStackTest extends TestCase
{
    public function test_app_uses_the_slim_skeleton(): void
    {
        $this->assertFalse(class_exists(\App\Http\Kernel::class));
        $this->assertFalse(class_exists(\App\Console\Kernel::class));
        $this->assertFalse(class_exists(\App\Exceptions\Handler::class));
    }

    public function test_global_middleware(): void
    {
        $this->assertSame([
            // added by the Laravel 11+ default stack
            \Illuminate\Http\Middleware\ValidatePathEncoding::class,
            \Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks::class,
            // same as the Laravel 10 Kernel
            \App\Http\Middleware\TrustProxies::class,
            \Illuminate\Http\Middleware\HandleCors::class,
            \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
            \Illuminate\Http\Middleware\ValidatePostSize::class,
            \App\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ], app(Kernel::class)->getGlobalMiddleware());
    }

    public function test_middleware_groups(): void
    {
        $this->assertSame([
            'web' => [
                \App\Http\Middleware\EncryptCookies::class,
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \App\Http\Middleware\VerifyCsrfToken::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
            'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
        ], app(Kernel::class)->getMiddlewareGroups());
    }

    public function test_middleware_aliases(): void
    {
        $aliases = app(Kernel::class)->getRouteMiddleware();
        ksort($aliases);

        $this->assertSame([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class, // Laravel 11+ default
            'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
            'can' => \Illuminate\Auth\Middleware\Authorize::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'not-guest' => \App\Http\Middleware\RedirectIfGuest::class,
            'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
            'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class, // Laravel 11+ default
            'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ], $aliases);
    }
}
