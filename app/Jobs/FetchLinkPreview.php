<?php

namespace App\Jobs;

use Embed\Embed;
use Illuminate\Foundation\Bus\Dispatchable;
use Verlanglijstjes\LinkPreview;

class FetchLinkPreview
{
    use Dispatchable;

    public function __construct(
        private int $wishId,
        private string $url
    ) {}

    public function handle(Embed $embed)
    {
        if ($this->isImageUrl()) {
            return LinkPreview::updateOrCreate([
                'wish_id' => $this->wishId
            ], [
                'link' => $this->url,
                'image' => $this->url,
            ]);
        }

        $info = $embed->get($this->url);

        return LinkPreview::updateOrCreate([
            'wish_id' => $this->wishId
        ], [
            'title' => $info->title,
            'description' => $info->description,
            'link' => $this->url,
            'image' => $info->image,
        ]);
    }

    private function isImageUrl()
    {
        // Good enough
        return str_ends_with($this->url, 'jpg') || str_ends_with($this->url, 'png') || str_ends_with($this->url, 'svg');
    }
}
