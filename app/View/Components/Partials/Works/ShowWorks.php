<?php

namespace App\View\Components\Partials\Works;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowWorks extends Component
{
    /**
     * Create a new component instance.
     */
    public $show, $title, $firstTitle;

    public function __construct($show = [], $title = "", $firstTitle = "")
    {
        $this->show = $show;
        $this->title = $title;
        $this->firstTitle = $firstTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.works.show-works');
    }
}
