<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $type;
    public $name;
    public $id;
    public $place;
    public $val;
    public $required;
    public $extraclasses;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $id, $place = null, $val, $required = null, $extraclasses = null, $label = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->place = $place;
        $this->val = $val;
        $this->required = $required;
        $this->extraclasses = $extraclasses;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.input-field');
    }
}
