<?php

namespace App\View\Components\Partials\Works;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MoreWorks extends Component
{
    /**
     * Create a new component instance.
     */
    public $works;
    public function __construct($works)
    {
        $this->works = $works;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.works.more-works');
    }
}
