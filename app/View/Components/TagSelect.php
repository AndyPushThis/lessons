<?php

namespace App\View\Components;


use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;


class TagSelect extends Component
{
    public Collection $tags;
    public Collection|null $current;

    /**
     * Create a new component instance.
     */
    public function __construct(Collection|null $current = null)
    {
        $this->tags = Tag::all();
        $this->current = $current;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-select');
    }
}
