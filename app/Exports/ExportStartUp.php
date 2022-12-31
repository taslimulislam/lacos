<?php

namespace App\Exports;

use Modules\EkoAdmin\Entities\StartUpModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStartUp implements FromView
{
    public function view(): View
    {
        return view('ekoadmin::startups.export', [
            'startups' => StartUpModel::with('country','industryadd')->get()
        ]);

    }
}
