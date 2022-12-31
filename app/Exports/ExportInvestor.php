<?php

namespace App\Exports;

use Modules\EkoAdmin\Entities\Investor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportInvestor implements FromView
{
    public function view(): View
    {
        return view('ekoadmin::investor.export', [
            'investor' => Investor::with('country','industry','investorType','investmentExit','investmentStage')->get()
        ]);

    }
}
