<?php

namespace App\Imports;

use Modules\EkoAdmin\Entities\Investor;
use Modules\EkoAdmin\Entities\Country;
use Modules\EkoAdmin\Entities\InvestmentExit;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\InvestmentStage;
use Modules\EkoAdmin\Entities\InvestorType;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvestorImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
            $industry1 = '';
            $invexit1  = '';
            $invstage1 = '';
            $invstype1 = '';
            $country1  = '';

            $industry = Industry::where('name' , $row['industry'])->first();
            $invexit  = InvestmentExit::where('name' , $row['investment_exit'])->first();
            $invstage = InvestmentStage::where('name' , $row['investment_stage'])->first();
            $invstype = InvestorType::where('name' , $row['investor_type'])->first();
            $country  = Country::where('country_name' , $row['country'])->first();

            !empty($industry)?$industry1=$industry->id:$industry1=0;
            !empty($invexit)?$invexit1=$invexit->id:$invexit1=0;
            !empty($invstage)?$invstage1=$invstage->id:$invstage1=0;
            !empty($invstype)?$invstype1=$invstype->id:$invstype1=0;
            !empty($country)?$country1=$country->id:$country1=0;

            Investor::create([
                'company_name'       => $row['company_name']?$row['company_name']:0,
                'industry_id'        => $row['industry']?$industry1:0,
                'country_id'         => $row['country']?$country1:0,
                'investor_types_id'  => $row['investor_type']?$invstype1:0,
                'investment_stage_id'=> $row['investment_stage']?$invstage1:0,
                'exits_id'           => $row['investment_exit']?$invexit1:0,
                'about'              => $row['about']?$row['about']:0,
                'web_link'           => $row['web_link']?$row['web_link']:0,
                'year_founded'       => $row['year_founded']?$row['year_founded']:0,
                'logo'               => $row['logo']?$row['logo']:0,
            ]);
        }
    }
    
}
