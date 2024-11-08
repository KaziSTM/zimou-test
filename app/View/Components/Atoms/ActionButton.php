<?php

namespace App\View\Components\Atoms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public string $action = '';
    public string $label = '';

    /**
     * Create a new component instance.
     */
    public function __construct(string $action, string $label)
    {
        $this->action = $action;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.action-button');
    }
}
