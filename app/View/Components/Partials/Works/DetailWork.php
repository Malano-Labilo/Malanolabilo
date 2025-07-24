<?php

namespace App\View\Components\Partials\Works;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailWork extends Component
{
    /**
     * Create a new component instance.
     */
    public $work;
    public function __construct($work)
    {
        $this->work = $work;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.works.detail-work');
    }
}
