<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Guest extends Component
{
    public $pageTitle = '';
    public $metaDetail = null;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $metaDetail = null)
    {
        $this->pageTitle = $pageTitle;

        if ($metaDetail == null) {
            $this->metaDetail = app()->make('App\Services\SettingService')->getSettings();
        } else {
            $this->metaDetail = $metaDetail;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.guest.guest');
    }
}
