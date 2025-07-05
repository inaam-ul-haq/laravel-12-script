<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllList extends Component
{
    public $allData;
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $data)
    {
        $this->allData = $data;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-list');
    }
}
