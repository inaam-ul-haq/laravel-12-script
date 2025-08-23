<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $cardHeader = null;
    public $headerButton = null;
    public $cardBody = null;
    public $card = null;
    public $cardBorder = null;

    /**
     * Create a new component instance.
     */
    public function __construct($cardHeader = null, $headerButton = null, $cardBody = 'card-body', $card = null, $cardBorder = 'primary')
    {
        $this->cardHeader = $cardHeader;
        $this->headerButton = $headerButton;
        $this->cardBody = $cardBody;
        $this->card = $card;
        $this->cardBorder = $cardBorder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
