<?php

namespace App\View\Components\Partials\Media;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowMedia extends Component
{
    /**
     * Create a new component instance.
     */
    public $media;
    public function __construct($media)
    {
        $this->media = $media;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.media.show-media');
    }
}
