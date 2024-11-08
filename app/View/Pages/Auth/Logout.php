<?php

namespace App\View\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.templates.auth')]
class Logout extends Component
{
    public function mount(): void
    {
        Auth::logout();

        $this->redirect(route('login'), true);
    }

    public function render()
    {
        return view('pages.auth.logout');
    }
}
