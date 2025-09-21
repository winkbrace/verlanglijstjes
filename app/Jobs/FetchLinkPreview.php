<?php

namespace App\Jobs;

use Embed\Detectors\Image;
use Embed\Embed;
use Embed\Extractor;
use Illuminate\Foundation\Bus\Dispatchable;
use Psr\Http\Message\UriInterface;
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
            'image' => $this->extractImageUrl($info),
        ]);
    }

    private function isImageUrl(): bool
    {
        $url = strtolower($this->url);

        // Good enough
        return str_ends_with($url, 'jpg')
            || str_ends_with($url, 'png')
            || str_ends_with($url, 'svg')
            || str_ends_with($url, 'webp');
    }

    private function extractImageUrl(Extractor $info): ?string
    {
        if ($info->image instanceof UriInterface) {
            return $this->buildUrl($info->image);
        }
        if ($info->image instanceof Image) {
            return $this->buildUrl($info->image->detect());
        }

        // string or null
        return $info->image;
    }

    private function buildUrl(UriInterface $uri): string
    {
        return $uri->getScheme() . '://' . $uri->getHost() . $uri->getPath();
    }
}
