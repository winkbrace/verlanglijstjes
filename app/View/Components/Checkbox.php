<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Verlanglijstjes\UserId;
use Verlanglijstjes\WishId;

class Checkbox extends Component
{
    public function __construct(
        public WishId $wishId,
        public ?UserId $claimedBy,
    ) {}

    public function render()
    {
        return view('components.checkbox');
    }
}
