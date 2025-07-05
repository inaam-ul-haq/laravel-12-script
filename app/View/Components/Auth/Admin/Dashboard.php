<?php

namespace App\View\Components\Auth\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\SchoolEvents;
use Illuminate\Support\Carbon;
use App\Repositories\SchoolEventsRepository;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.admin.dashboard');
    }
}
