<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Login extends Component
{
    public $pageTitle = '';
    public $subTitle = '';

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $subTitle = null)
    {
        $this->pageTitle = $pageTitle;
        $this->subTitle = $subTitle == null ? "Sign in to your account to continue" : $subTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.guest.login');
    }
}
