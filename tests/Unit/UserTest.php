<?php

declare(strict_types=1);

namespace Tests\Unit;

use Database\Seeders\UsersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Verlanglijstjes\User;
use Verlanglijstjes\UserId;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(UsersSeeder::class);
    }

    public function test_it_casts_to_user_id_object(): void
    {
        /** @var User $user */
        $user = User::find(1);

        self::assertInstanceOf(UserId::class, $user->id);
    }
}
