<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InterventionItem extends Component
{
    public $intervention;

    public function __construct($intervention)
    {
        $this->intervention = $intervention;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.index.intervention-item');
    }
}
