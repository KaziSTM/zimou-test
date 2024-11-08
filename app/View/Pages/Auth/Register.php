<?php

namespace App\View\Pages\Auth;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

#[Layout('components.templates.auth')]
class Register extends Component
{
    use Interactions;

    #[Rule('required|string|min:3')]
    public string $name = '';

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|min:8|same:passwordConfirmation')]
    public string $password = '';
    public string $passwordConfirmation = '';

    public function register()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $user = User::create($this->all());
            DB::commit();
            Auth::login($user, true);
            return $this->redirect(route('dashboard'), true);
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dialog()->error($exception->getMessage())->send();
        }
    }

    public function render(): View|Factory|ApplicationAlias
    {
        return view('pages.auth.register');
    }
}
