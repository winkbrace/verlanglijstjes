<?php declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Verlanglijstjes\User;
use Verlanglijstjes\Wish;

/**
 * Characterization tests for the API routes, which the frontend calls using the session cookie (Sanctum stateful auth).
 */
class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_not_claim_a_wish(): void
    {
        $wish = $this->createWish(User::factory()->create());

        $this->postJson(route('claim-wish'), ['id' => $wish->id->toInt(), 'action' => 'claim'])
            ->assertUnauthorized();

        $this->assertNull($wish->fresh()->claimed_by);
    }

    public function test_user_can_claim_a_wish_with_a_sanctum_token(): void
    {
        $wish = $this->createWish(User::factory()->create());
        $claimer = User::factory()->create();
        Sanctum::actingAs($claimer);

        $this->postJson(route('claim-wish'), ['id' => $wish->id->toInt(), 'action' => 'claim'])
            ->assertOk();

        $wish = $wish->fresh();
        $this->assertTrue($wish->claimed_by->equals($claimer->id));
        $this->assertNotNull($wish->claimed_at);
    }

    public function test_user_can_claim_and_unclaim_a_wish_from_the_frontend_session(): void
    {
        $wish = $this->createWish(User::factory()->create());
        $claimer = User::factory()->create();

        $this->actingAs($claimer)
            ->withHeader('Referer', config('app.url'))
            ->postJson(route('claim-wish'), ['id' => $wish->id->toInt(), 'action' => 'claim'])
            ->assertOk();

        $this->assertTrue($wish->fresh()->claimed_by->equals($claimer->id));

        $this->actingAs($claimer)
            ->withHeader('Referer', config('app.url'))
            ->postJson(route('claim-wish'), ['id' => $wish->id->toInt(), 'action' => 'unclaim'])
            ->assertOk();

        $this->assertNull($wish->fresh()->claimed_by);
    }

    public function test_user_can_delete_own_wish(): void
    {
        $owner = User::factory()->create();
        $wish = $this->createWish($owner);
        Sanctum::actingAs($owner);

        $this->postJson(route('delete-wish', ['id' => $wish->id->toInt()]))->assertOk();

        $this->assertSoftDeleted('wishes', ['id' => $wish->id->toInt()]);
    }

    public function test_user_can_not_delete_wish_of_someone_else(): void
    {
        $wish = $this->createWish(User::factory()->create());
        Sanctum::actingAs(User::factory()->create());

        $this->postJson(route('delete-wish', ['id' => $wish->id->toInt()]))->assertForbidden();

        $this->assertNotSoftDeleted('wishes', ['id' => $wish->id->toInt()]);
    }

    private function createWish(User $owner): Wish
    {
        return Wish::factory()->create(['user_id' => $owner->id->toInt(), 'link' => null]);
    }
}
