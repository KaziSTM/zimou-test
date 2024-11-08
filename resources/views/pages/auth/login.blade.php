<div class="px-4 py-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-atoms.logo class="w-24 sm:w-30 md:w-36 lg:w-48"/>

        <x-atoms.h1 class="text-center mt-4 font-bold text-secondary-900 dark:text-secondary-50">
            {{ __('Sign in to your account') }}
        </x-atoms.h1>

        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-secondary-600 leading-5 max-w dark:text-secondary-300">
                {{ __('Or') }}
                <a wire:navigate href="{{ route('register') }}"
                   class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150 dark:text-primary-400 dark:hover:text-primary-300">
                    {{ __('create a new account') }}
                </a>
            </p>
        @endif
    </div>
    <div class="px-4 py-8 sm:px-10 ">
        <form class="space-y-4">
            <div>
                <x-input label="{{ __('Email') }}" wire:model.defer="email"
                         class="bg-secondary-50 dark:bg-secondary-700 dark:text-secondary-50"/>
            </div>

            <div>
                <x-password label="{{ __('Password') }}" wire:model.defer="password"
                            class="bg-secondary-50 dark:bg-secondary-700 dark:text-secondary-50"/>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div>
                    <x-checkbox id="right-label" label="{{ __('Remember') }}" wire:model.defer="remember"/>
                </div>
            </div>

            <div class="mt-6">
                <x-atoms.action-button label="{{__('Sign in')}}" action="authenticate"
                                       class="bg-primary-600 hover:bg-primary-500 focus:outline-none dark:bg-primary-500 dark:hover:bg-primary-400"/>
            </div>
        </form>
    </div>
</div>
