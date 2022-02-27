<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Verlanglijstjes\UserId;
use Verlanglijstjes\WishId;

class WishButton extends Component
{
    public function __construct(
        public string $type,
        public WishId $id,
        public string $label,
        public ?UserId $claimedBy = null,
    ) {}

    public function render()
    {
        return view('components.wish-button');
    }
}
