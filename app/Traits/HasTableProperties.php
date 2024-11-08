<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use TallStackUi\Traits\Interactions;

trait HasTableProperties
{
    use Interactions;

    public function appendColumns(): array
    {
        return [
            Column::make(trans("Created at"), "created_at")
                ->sortable(),
            Column::make(trans("Updated at"), "updated_at")
                ->sortable(),
            ComponentColumn::make(trans('Actions'), 'id')
                ->component('atoms.columns.actions')
                ->attributes(fn($value, $row, Column $column) => [
                    'actions' => $this->actions(),
                    'id' => $value,
                ]),
        ];
    }

    public function configure(): void
    {

        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc')
            ->setHideBulkActionsWhenEmptyStatus(true)
            ->setTableWrapperAttributes([
                'class' => 'soft-scrollbar',
            ])
            ->setTheadAttributes([
                'class' => '!bg-white',
            ])
            ->setBulkActions(array_merge($this->defineBulkActions(), $this->getDefaultBulkAction()));

    }

    private function getDefaultBulkAction(): array
    {
        return [
            'deleteConfirmation' => trans('Delete'),
        ];
    }

    public function filters(): array
    {
        return array_merge($this->setFilters(), $this->defaultFilters());
    }

    private function defaultFilters(): array
    {
        return [
            DateFilter::make('created_at', trans('Created at')),
            DateFilter::make('updated_at', trans('Updated at')),
        ];
    }

    public function deleteConfirmation(?int $id = null): void
    {
        $this->openDialog(
            title: trans('Warning!'),
            description: trans('Are you sure?'),
            confirmLabel: trans('Yes,delete it'),
            confirm_method: 'confirmDelete',
            id: $id,
            cancel_method: 'cancel'
        );
    }

    public function openDialog(
        string $title,
        string $description,
        string $confirmLabel,
        string $confirm_method,
        mixed $id = null,
        ?string $cancel_method = null,
    ): void {
        $dialog = $this->dialog()->question($title, $description)
            ->confirm($confirmLabel, $confirm_method, $id);

        if ($cancel_method) {
            $dialog->cancel(trans('Cancel'), $cancel_method, $id);
        }

        $dialog->send();
    }

    public function confirmDelete(?int $id = null): void
    {
        if ($id) {
            $this->delete($id);
        } else {
            foreach ($this->getSelected() as $id) {
                $this->delete($id);
            }
        }
        $this->notify();
        $this->clearSelected();
        $this->dispatch('refreshDatatable');
    }

    public function delete(int $id): void
    {
        $this->getModelById($id)->delete();
    }

    public function getModelById(int|string $id): ?Model
    {
        return app($this->model)->findOrFail($id);
    }

    private function notify(): void
    {
        $this->toast()->success(trans('Action saved'), trans('Action was executed successfully'))->send();

    }

    public function show(int $id): void
    {
        $this->redirect(route($this->getRedirectRoute('show'), $id), true);
    }

    private function getRedirectRoute(string $action): string
    {
        return property_exists($this,
            'defaultRedirectRoute') ? $this->defaultRedirectRoute.'.'.$action : 'admin.'.$this->getBaseName().'.'.$action;
    }

    private function getBaseName(): string
    {
        return strtolower(basename($this->model));
    }

    public function edit(int $id): void
    {
        $this->redirect(route($this->getRedirectRoute('edit'), $id), true);
    }


    private function getDefaultEditAction(): array
    {
        return [
            'label' => trans('Edit'),
            'icon' => 'pencil',
            'iconColor' => 'orange',
            'action' => 'edit',
        ];

    }

    private function getDefaultRemoveAction(): array
    {
        return [
            'label' => trans('Delete'),
            'icon' => 'trash',
            'iconColor' => 'red',
            'action' => 'deleteConfirmation',
        ];
    }

    private function getDefaultViewAction(): array
    {
        return [
            'label' => trans('View'),
            'icon' => 'eye',
            'iconColor' => 'primary',
            'action' => 'show',
        ];
    }
}
