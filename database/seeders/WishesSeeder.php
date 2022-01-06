<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Verlanglijstjes\Wish;

class WishesSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersSeeder::class);

        Wish::factory()->count(4)->create();
        Wish::factory()->count(2)->claimed()->create();
        Wish::factory()->count(2)->deleted()->create();
    }
}
