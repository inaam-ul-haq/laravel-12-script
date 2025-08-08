<?php

namespace App\View\Components;

use App\Interfaces\CategoryInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryList extends Component
{
    public $categorylist;
    public $category;

    /**
     * Create a new component instance.
     */
    public function __construct(CategoryInterface $category_interface, $category = null)
    {
        $this->categorylist = $category_interface->all();
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-list');
    }
}
