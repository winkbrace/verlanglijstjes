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
    ) {
        if ($this->claimedByAnother()) {
            $this->label = 'Gereserveerd';
        }
    }

    public function render()
    {
        return view('components.wish-button');
    }

    public function color(): string
    {
        if ($this->claimedByAnother()) {
            return 'warmgray';
        }

        return $this->type === 'delete' ? 'red' : 'yellow';
    }

    public function claimedByAnother(): bool
    {
        return $this->claimedBy !== null && ! user()->id->equals($this->claimedBy);
    }
}
