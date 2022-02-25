<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Verlanglijstjes\WishId;

class WishButton extends Component
{
    public function __construct(
        public string $type,
        public WishId $id
    ) {}

    public function render()
    {
        return view('components.wish-button');
    }
}
