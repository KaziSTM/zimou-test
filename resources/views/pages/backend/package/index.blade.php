<x-organisms.section>
    <x-slot name="title">
        {!! trans('Packages') !!}
    </x-slot>
    <x-slot name="action">
        <div class="flex space-x-4">
            <x-button text="{!! trans('Add') !!}" icon="plus" position="right" primary outline
                      wire:click="redirectToCreatePage"/>
            <x-button text="{!! trans('Export Csv') !!}" icon="export" position="right" color="secondary" outline
                      wire:click="exportExcel"/>
        </div>
    </x-slot>
    <x-slot name="description">
        {!! trans('') !!}
    </x-slot>
    <livewire:tables.package-table/>
</x-organisms.section>
