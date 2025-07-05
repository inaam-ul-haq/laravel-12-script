<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Datatable extends Component
{
    public $id;
    public $search;

    /**
     * Create a new component instance.
     */
    public function __construct($id = 'myTable', $search = true)
    {
        $this->id = $id;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.datatable');
    }
}
