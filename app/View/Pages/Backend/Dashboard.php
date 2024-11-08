<?php

namespace App\View\Pages\Backend;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.templates.app')]
class Dashboard extends Component
{
    public function render()
    {
        return view('pages.backend.dashbaord');
    }
}
