<?php declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\FetchLinkPreview;
use Illuminate\Console\Command;
use Verlanglijstjes\Wish;

class FetchLinkPreviews extends Command
{
    protected $signature = 'fetch:link-previews';
    protected $description = 'Fetch link previews for all active wishes with a link (dev only)';

    public function handle()
    {
        $links = Wish::whereNull('deleted_at')
            ->whereNotNull('link')
            ->where('link', '!=', '')
            ->get()
//            ->filter(fn (Wish $wish) => empty($wish->linkPreview))
            ->pluck('link', 'id');

        $success = $failed = 0;
        foreach ($links as $wishId => $url) {
            try {
                dispatch(new FetchLinkPreview((int) $wishId, trim($url)));
                $this->line("Fetched link preview for $url");
                $success++;
            } catch (\Throwable) {
                $this->warn("Could not create link preview for $url");
                $failed++;
            }
        }

        $this->info("\n$success link previews were inserted.");
        $this->line("$failed link previews could not be created.");

        return 0;
    }
}
