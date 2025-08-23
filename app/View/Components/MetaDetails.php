<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MetaDetails extends Component
{
    public $metaDetail;

    /**
     * Create a new component instance.
     */
    public function __construct($metaDetail = null)
    {
        $this->metaDetail = $metaDetail;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meta-details');
    }
}
