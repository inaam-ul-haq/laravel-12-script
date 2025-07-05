<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    public $pageTitle = null;
    public $subTitle = null;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle = null, $subTitle = null)
    {
        $this->pageTitle = $pageTitle;
        $this->subTitle = $subTitle == null ? "Welcome " . auth()->user()->full_name . " to " . config('app.name') : $subTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth.app');
    }
}
