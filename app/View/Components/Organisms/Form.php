<?php

namespace App\View\Components\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public ?string $defaultAction;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $defaultAction = null)
    {
        $this->defaultAction = $defaultAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organisms.form');
    }
}
