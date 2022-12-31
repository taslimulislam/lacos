<?php

namespace App\Exports;

use Modules\EkoAdmin\Entities\Hub;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportHub implements FromView
{
    public function view(): View
    {
        return view('ekoadmin::hub.export', [
            'hubs' => Hub::with('country','industry')->get()
        ]);

    }
}
