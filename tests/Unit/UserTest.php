<?php

declare(strict_types=1);

namespace Tests\Unit;

use Database\Seeders\UsersSeeder;
use Tests\TestCase;
use Verlanglijstjes\User;
use Verlanglijstjes\UserId;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(UsersSeeder::class);
    }

    public function test_it_should_cast_user_properties(): void
    {
        /** @var User $user */
        $user = User::find(1);

        self::assertInstanceOf(UserId::class, $user->id);
        self::assertEquals('GJ', $user->name);
    }
}
