<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class CategorySelect extends Component
{
    public Collection $categories;
    public null|int $currentId;
    /**
     * Create a new component instance.
     */
    public function __construct(null|int $id = null)
    {
        $this->categories = Category::all();
        $this->currentId = $id;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-select');
    }
}
