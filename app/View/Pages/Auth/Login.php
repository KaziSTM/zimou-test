<?php

namespace App\View\Pages\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

#[Layout('components.templates.auth')]
class Login extends Component
{
    use Interactions;

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|min:8')]
    public string $password = '';

    public bool $remember = true;

    public function authenticate(): void
    {
        $credentials = $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->redirect(route('dashboard'), true);
        }
        $this->addError('email', __('invalid credentials'));
    }

    public function render(): View|Factory|Application
    {
        return view('pages.auth.login');
    }
}
