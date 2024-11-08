<?php

namespace App\View\Pages\Backend\Package;

use App\Support\FormComponent;
use Livewire\Attributes\Layout;

#[Layout('components.templates.app')]
class Index extends FormComponent
{
    public function render()
    {
        return view('pages.backend.package.index');
    }
}
