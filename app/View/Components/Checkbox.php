<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Verlanglijstjes\WishId;

class Checkbox extends Component
{
    public function __construct(public WishId $wishId) {}

    public function render()
    {
        return view('components.checkbox');
    }
}
