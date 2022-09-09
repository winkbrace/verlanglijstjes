<?php declare(strict_types=1);

namespace Database\Factories\Verlanglijstjes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Verlanglijstjes\User;
use function now;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'birth_date' => $this->faker->date(),
            'generation' => 1,
            'position' => $this->faker->numberBetween(1, 4),
            'avatar' => null,
            'chocolate_preference' => 'Melk',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
