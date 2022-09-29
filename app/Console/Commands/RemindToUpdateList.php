<?php

namespace App\Console\Commands;

use App\Mail\UpcomingBirthdayReminder;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use Verlanglijstjes\User;

class RemindToUpdateList extends Command
{
    protected $signature = 'remind:to-update-list';
    protected $description = 'Send a reminder to update the list for upcoming birthday';

    public function handle(): int
    {
        try {
            // We don't add a month, because then someone might get emailed twice with irregular month lengths.
            $nextMonth = now()->addDays(30)->format('d-m');

            /** @var Collection|User[] $users */
            $users = User::whereNot('name', 'Gast')
                ->whereRaw("date_format(birth_date, '%d-%m') = ?", [$nextMonth])
                ->get();

            foreach ($users as $user) {
                Mail::to($user)->send(new UpcomingBirthdayReminder($user));
            }

            return 0;

        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            $this->error($e->getTraceAsString());
            return $e->getCode();
        }
    }
}
