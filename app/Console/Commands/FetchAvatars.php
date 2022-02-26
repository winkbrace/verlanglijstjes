<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Verlanglijstjes\User;

class FetchAvatars extends Command
{
    protected $signature = 'fetch:avatars';
    protected $description = 'Fetch random avatar generated based on name using multiavatar (dev only)';

    public function handle(\Multiavatar $multiavatar)
    {
        /** @var User[] $users */
        $users = User::whereNull('avatar')->get();

        foreach ($users as $user) {
            $avatar = $multiavatar->generate($user->name, null, null);

            $path = public_path('/img/avatar-' . strtolower($user->name) . '.svg');
            file_put_contents($path, $avatar);

            $user->avatar = $path;
            $user->save();
        }

        $this->info("Successfully generated all avatars");

        return 0;
    }
}
