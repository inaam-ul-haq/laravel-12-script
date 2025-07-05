<?php

namespace App\View\Components;

use App\Constants\Constants;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Role;

class RoleList extends Component
{
    public $list = null;
    public $existingId = null;

    /**
     * Create a new component instance.
     */
    public function __construct($existingId = null)
    {
        $this->list = Role::whereNotIn('name', [Constants::SUPERADMIN, Constants::USER])->select('name', 'id')->get();
        $this->existingId = $existingId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.role-list');
    }
}
