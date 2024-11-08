<?php

namespace App\View\Tables;

use App\Enums\DeliveryTypeEnum;
use App\Enums\StatusesEnum;
use App\Interface\TablesInterface;
use App\Models\Package;
use App\Traits\HasTableProperties;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class PackageTable extends DataTableComponent implements TablesInterface
{
    use HasTableProperties;

    protected $model = Package::class;

    public function actions(): array
    {

        return [
            $this->getDefaultEditAction(),
            $this->getDefaultRemoveAction()
        ];
    }

    public function setFilters(): array
    {
        return [];
    }

    public function defineBulkActions(): array
    {
        return [];
    }

    public function columns(): array
    {
        return [
            Column::make(trans('Tracking code'), 'tracking_code')
                ->searchable()
                ->sortable(),
            Column::make(trans('Store name'), 'id')
                ->format(fn($value) => $this->getModelById($value)->store->name)
                ->searchable(function (Builder $package, $searchTerm) {
                    $package->whereHas('store', function (Builder $store) use ($searchTerm) {
                        $store->where('name', 'like', '%'.$searchTerm.'%');
                    });
                })
                ->sortable(),
            Column::make(trans('Package name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(trans('Client full name'), 'id')
                ->format(function ($value) {
                    $package = $this->getModelById($value);
                    return $package->client_last_name.' '.$package->client_first_name;
                }),
            Column::make(trans('Phone'), 'id')
                ->format(fn($value) => $this->getModelById($value)->store->phones)
                ->sortable(),
            Column::make(trans('Wilaya'), 'id')
                ->format(fn($value) => $this->getModelById($value)->commune->wilaya->name)
                ->sortable(),
            Column::make(trans('Commune'), 'id')
                ->format(fn($value) => $this->getModelById($value)->commune->name)
                ->sortable(),
            ComponentColumn::make(trans("Delivery Type"), "id")
                ->component('atoms.columns.badge')
                ->attributes(function ($value, $row) {
                    $package = $this->getModelById($value);
                    $delivery_type = $package->deliveryType->name;
                    return [
                        'text' => DeliveryTypeEnum::label($delivery_type),
                        'color' => 'secondary'
                    ];
                }),
            ComponentColumn::make(trans("Status name"), "id")
                ->component('atoms.columns.badge')
                ->attributes(function ($value, $row) {
                    $package = $this->getModelById($value);
                    $status_type = $package->status->name;
                    return [
                        'text' => StatusesEnum::label($status_type),
                        'color' => match ($status_type) {
                            StatusesEnum::Pending => 'yellow',
                            StatusesEnum::InTransit => 'blue',
                            StatusesEnum::Delivered => 'green',
                            StatusesEnum::Returned => 'red',
                            StatusesEnum::Canceled => 'gray',
                            default => 'black',
                        }
                    ];
                }),
        ];
    }


    private function getDefaultBulkAction(): array
    {
        return [
            'deleteConfirmation' => trans('Delete'),
        ];
    }
}
