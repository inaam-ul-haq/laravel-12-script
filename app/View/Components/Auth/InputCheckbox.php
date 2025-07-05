<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $name;
    public $id;
    public $label;
    public $value;
    public $required;
    public $extraclasses;
    public $marginTop;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $id, $label, $value = null, $required = null, $extraclasses = null, $marginTop = '3')
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->extraclasses = $extraclasses;
        $this->marginTop = "mt-" . $marginTop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.input-checkbox');
    }
}
