<x-organisms.section>
    <x-slot name="title">
        {!! trans('Packages') !!}
    </x-slot>
    <x-slot name="action">
        <x-button text="{!! trans('Add') !!}" icon="plus" position="right" primary outline
                  wire:click="redirectToCreatePage"/>
    </x-slot>
    <x-slot name="description">
        {!! trans('') !!}
    </x-slot>
    <livewire:tables.package-table/>
</x-organisms.section>
