<?php declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class WishList extends Component
{
    public function __construct(
        public string $title,
        public Collection $wishes,
    ) {}

    public function render()
    {
        return view('components.wish-list');
    }
}
