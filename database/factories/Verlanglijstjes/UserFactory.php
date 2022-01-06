<?php declare(strict_types=1);

namespace Database\Factories\Verlanglijstjes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Verlanglijstjes\User;
use function now;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'email_verified_at' => "\Illuminate\Support\Carbon", 'password' => "string", 'remember_token' => "string", 'generation' => "int", 'position' => "int", 'chocolate_preference' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'generation' => 1,
            'position' => $this->faker->numberBetween(1, 4),
            'chocolate_preference' => 'Melk'
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
