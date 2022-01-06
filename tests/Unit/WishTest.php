<?php declare(strict_types=1);

use Carbon\CarbonImmutable;
use Database\Seeders\WishesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Verlanglijstjes\UserId;
use Verlanglijstjes\Wish;
use Tests\TestCase;
use Verlanglijstjes\WishId;

class WishTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(WishesSeeder::class);
    }

    public function test_it_casts_to_id_objects()
    {
        /** @var Wish $wish */
        $wish = Wish::find(1);

        self::assertInstanceOf(WishId::class, $wish->id);
        self::assertInstanceOf(UserId::class, $wish->user_id);
        self::assertInstanceOf(CarbonImmutable::class, $wish->created_at);
    }
}
