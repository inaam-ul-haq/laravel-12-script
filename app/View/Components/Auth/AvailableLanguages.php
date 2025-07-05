<?php

namespace App\View\Components\Auth;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvailableLanguages extends Component
{
    public $langauges;
    public $default_language;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $setting = Setting::select('languages', 'default_language')->first();

        $this->langauges = $setting->languages;
        $this->default_language = $setting->default_language;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.available-languages');
    }
}
