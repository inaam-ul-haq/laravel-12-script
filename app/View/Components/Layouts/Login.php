<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Login extends Component
{
    public $pageTitle = '';
    public $subTitle = '';
    public $metaDetail = null;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $subTitle = null, $metaDetail = null)
    {
        $this->pageTitle = $pageTitle;
        $this->subTitle = $subTitle == null ? __('language.login_default_subtitle') : $subTitle;

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
        return view('layouts.guest.login');
    }
}
