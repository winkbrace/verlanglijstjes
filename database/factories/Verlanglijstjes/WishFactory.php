<?php

namespace Database\Factories\Verlanglijstjes;

use Illuminate\Database\Eloquent\Factories\Factory;
use function now;

class WishFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'description' => $this->faker->sentence(4),
            'link' => $this->faker->url(),
            'claimed_by' => null,
            'claimed_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }

    /**
     * Indicate that the wish item has been claimed
     */
    public function claimed(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'claimed_by' => 1,
                'claimed_at' => now(),
            ];
        });
    }

    /**
     * Indicate that the wish item has been deleted
     */
    public function deleted(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => now(),
            ];
        });
    }
}
