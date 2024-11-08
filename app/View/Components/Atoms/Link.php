<?php

namespace App\View\Components\Atoms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public string $route = '';

    public string $label = '';

    public string $request = '';

    public string $icon = '';

    public ?array $links = null;

    public bool $collapsed = false;

    public function __construct(string $label, string $route, ?string $icon = null, bool $collapsed = false)
    {
        $this->label = $label;
        $this->route = $route;
        $this->request = preg_replace('/\.index$/', '.*', $route);
        if ($icon) {
            $this->icon = $icon;
        }
        $this->collapsed = $collapsed;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.link');
    }
}
