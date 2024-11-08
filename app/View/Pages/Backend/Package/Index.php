<?php

namespace App\View\Pages\Backend\Package;

use App\Actions\Exports\AsExcel;
use App\Support\FormComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('components.templates.app')]
class Index extends FormComponent
{

    public function exportExcel(): void
    {
        defer(fn() => AsExcel::run());
        $this->toast()->success(trans('Export started'), trans('The export has been queued for download'))->send();
    }

    #[On('ExportCompleted')]
    public function download($filePath)
    {
        $this->toast()->success(trans('Export completed'), trans('The file is ready for download'))->send();
        return response()->download(storage_path("app/$filePath"));
    }

    public function render()
    {
        return view('pages.backend.package.index');
    }
}
