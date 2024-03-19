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
    public int|null $currentId;

    /**
     * Create a new component instance.
     */
    public function __construct(int|null $id = null)
    {
        $this->tags = Tag::all();
        $this->currentId = $id;
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
