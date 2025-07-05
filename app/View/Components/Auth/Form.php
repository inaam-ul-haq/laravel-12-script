<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $enctype = false;
    public $formAction = null;
    public $extraClass = null;
    public $formId = null;

    /**
     * Create a new component instance.
     */
    public function __construct($formAction, $enctype = false, $extraClass = null, $formId = null)
    {
        $this->formAction = $formAction;
        $this->enctype = $enctype;
        $this->extraClass = $extraClass;
        $this->formId = $formId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.form');
    }
}
