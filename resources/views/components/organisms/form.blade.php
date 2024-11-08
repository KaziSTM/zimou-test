<div class="mt-5 md:mt-0 md:col-span-2 space-y-10 ">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="space-y-5">
            @isset($title)
                <x-atoms.h1>
                    {{ $title }}
                </x-atoms.h1>
            @endisset
            @isset($description)
                <div class="md:max-w-7xl md:mx-auto sm:mt-6 font-pj grid gap-4">
                    <p class="mt-4 text-sm text-secondary-700 dark:text-secondary-300">
                        {{ $description }}
                    </p>
                    <x-errors/>
                </div>
            @endisset
        </div>
        <div
            @class([
                'col-span-2',
                'sm:rounded-tl-md sm:rounded-tr-md'=>isset($actions),
                'sm:rounded-md'=>!isset($actions),
            ])>
            <div
                class="px-4 py-5 rounded-md bg-secondary-100 dark:bg-secondary-600 shadow dark:shadow-secondary-800 max-w-5xl">
                @csrf
                {{ $slot }}
            </div>
            <div
                class="flex items-center px-4 py-3 text-right shadow bg-secondary-100 dark:bg-secondary-800 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                @if (isset($customActions))
                    {{ $customActions }}
                @else
                    @switch($defaultAction )
                        @case('create')
                            <div class="flex justify-start items-center space-x-4">
                                <x-button text="{!! trans('Create') !!}" color="primary" outline
                                          wire:click="store()" loading="store"/>
                                <x-button text="{!! trans('Create & create another') !!}" color="secondary" outline
                                          wire:click="store({{true}})" loading="store"/>
                                <x-button text="{!! trans('Cancel') !!}" color="secondary" outline
                                          wire:click="cancel" loading="cancel"/>
                            </div>
                            @break
                        @case('edit')
                            <div class="flex justify-start items-center space-x-4">
                                <x-button text="{!! trans('Update') !!}" color="primary" outline
                                          wire:click="update()" loading="update"/>
                                <x-button text="{!! trans('Cancel') !!}" color="secondary" outline
                                          wire:click="cancel" loading="cancel"/>
                            </div>
                            @break
                        @case('show')
                            <div class="flex justify-start items-center space-x-4">
                                <x-button text="{!! trans('Cancel') !!}" color="secondary" outline
                                          wire:click="cancel" loading="cancel"/>
                            </div>
                            @break
                    @endswitch
                @endif
            </div>
        </div>

    </div>

</div>
