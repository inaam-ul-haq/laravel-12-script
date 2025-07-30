<?php

namespace App\View\Components\Auth;

use App\Models\AuthSidebarMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $sidebarmenus = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sidebarmenus = app()->make('App\Interfaces\AuthSidebarMenuInterface')->sidebarMenus();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth.sidebar');
    }
}
