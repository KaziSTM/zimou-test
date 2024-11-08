<?php

namespace App\Exports;

use App\Models\Package;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PackagesExport implements FromQuery, WithHeadings, WithMapping, ShouldQueue, WithChunkReading
{

    use Exportable;


    public function query()
    {
        return Package::query();
    }

    /**
     * Define the headings for the export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tracking Code',
            'Store Name',
            'Package Name',
            'Client Full Name',
            'Phone',
            'Wilaya',
            'Commune',
            'Delivery Type',
            'Status Name',
        ];
    }

    /**
     * Map data for each package in the export.
     *
     * @param $package
     * @return array
     */
    public function map($package): array
    {
        return [
            $package->tracking_code,
            $package->store->name,
            $package->name,
            $package->client_last_name.' '.$package->client_first_name,
            $package->store->phones,
            $package->commune->wilaya->name,
            $package->commune->name,
            $package->deliveryType->name,
            $package->status->name,
        ];
    }

    /**
     * Set chunk size for processing.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 50;
    }

}
