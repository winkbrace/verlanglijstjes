<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Verlanglijstjes\Wish;

class WishForm extends Component
{
    public function __construct(public string $title, public string $action, public ?Wish $wish = null) {}

    public function render()
    {
        return view('components.wish-form');
    }
}
