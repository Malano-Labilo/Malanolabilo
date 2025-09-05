<?php

namespace App\View\Components\Partials\Media;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowAllMedia extends Component
{
    /**
     * Create a new component instance.
     */
    public $firstTitle, $title, $medias;
    public function __construct($medias = [], $title = "", $firstTitle = "")
    {
        $this->medias = $medias;
        $this->title = $title;
        $this->firstTitle = $firstTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.media.show-all-media');
    }
}
