<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextEditor extends Component
{
    public $name;
    public $id;
    public $place;
    public $val;
    public $required;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = 'content', $id = 'content', $place = "Your content here", $val = null, $required = false, $label = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->place = $place;
        $this->val = $val;
        $this->required = $required;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.text-editor');
    }
}
