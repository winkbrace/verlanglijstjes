<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Verlanglijstjes\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(2)->create();
    }
}
