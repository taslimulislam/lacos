<?php

namespace App\Imports;

use Modules\EkoAdmin\Entities\Hub;
use Modules\EkoAdmin\Entities\Country;
use Modules\EkoAdmin\Entities\Industry;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HubImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $industry1 = '';
            $country1  = '';

            $industry = Industry::where('name' , $row['industry'])->first();
            $country  = Country::where('country_name' , $row['country'])->first();

            !empty($industry)?$industry1=$industry->id:$industry1=0;
            !empty($country)?$country1=$country->id:$country1=0;

            Hub::create([
                'name'             => $row['name']?$row['name']:0,
                'num_of_investment'=> $row['num_of_investment']?$row['num_of_investment']:0,
                'country_id'       => $row['country']?$country1:0,
                'industry_id'      => $row['industry']?$industry1:0,
                'about'            => $row['about']?$row['about']:'',
                'address'          => $row['address']?$row['address']:'',
                'year_launched'    => $row['year_launched']?$row['year_launched']:0,
                'web_link'         => $row['web_link']?$row['web_link']:0,
                'logo'             => $row['logo']?$row['logo']:0,
            ]);
        }
    }
}
