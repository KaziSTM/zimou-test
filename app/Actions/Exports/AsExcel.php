<?php

namespace App\Actions\Exports;

use App\Events\ExportCompleted;
use App\Exports\PackagesExport;
use Lorisleiva\Actions\Concerns\AsAction;

class AsExcel
{
    use AsAction;

    public function handle()
    {
        $filePath = 'exports/packages_'.now()->timestamp.'.xlsx';

        (new PackagesExport)->queue($filePath)
            ->chain([
                function () use ($filePath) {
                    broadcast(new ExportCompleted($filePath));
                }
            ]);
    }
}
