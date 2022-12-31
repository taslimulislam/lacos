<?php

namespace App\Imports;
use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\EkoAdmin\Entities\Country;
use Modules\EkoAdmin\Entities\Industry;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StartUpImport implements ToCollection, WithHeadingRow
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

            StartUpModel::create([
                'name'           => $row['name']?$row['name']:0,
                'description'    => $row['description']?$row['description']:0,
                'address'        => $row['address']?$row['address']:'',
                'country_id'     => $row['country']?$country1:0,
                'no_of_employees'=> $row['no_of_employees']?$row['no_of_employees']:0,
                'year_launched'  => $row['year_launched']?$row['year_launched']:0,
                'industry'       => $row['industry']?$industry1:0,
                'market_segment' => $row['market_segment']?$row['market_segment']:'',
                'funding_stage'  => $row['funding_stage']?$row['funding_stage']:0,
                'about'          => $row['about']?$row['about']:'',
                'web_link'       => $row['web_link']?$row['web_link']:0,
                'fb_link'        => $row['fb_link']?$row['fb_link']:0,
                'twitter_link'   => $row['twitter_link']?$row['twitter_link']:0,
                'insta_link'     => $row['insta_link']?$row['insta_link']:0,
                'linkedIn_link'  => $row['linkedin_link']?$row['linkedin_link']:0,
                'news_post_id'   => 0,
                'logo'           => $row['logo']?$row['logo']:0,
            ]);
        }
    }
}
