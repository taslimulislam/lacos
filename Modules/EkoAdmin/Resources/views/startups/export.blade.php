<table>
    <thead>
    <tr>
        <th>name</th>
        <th>num_of_investment</th>
        <th>country</th>
        <th>industry</th>
        <th>about</th>
        <th>address</th>
        <th>year_launched</th>
        <th>web_link</th>
        <th>logo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($startups as $startup)
        <tr>
            <td>{{$startup?->name }}</td>
            <td>{{$startup?->description }}</td>
            <td>{{$startup?->address }}</td>
            <td>{{$startup?->country?->country_name }}</td>
            <td>{{$startup?->no_of_employees }}</td>
            <td>{{$startup?->year_launched }}</td>
            <td>{{$startup?->industryadd?->name }}</td>
            <td>{{$startup?->market_segment }}</td>
            <td>{{$startup?->funding_stage }}</td>
            <td>{{$startup?->about }}</td>
            <td>{{$startup?->web_link }}</td>
            <td>{{$startup?->fb_link }}</td>
            <td>{{$startup?->twitter_link }}</td>
            <td>{{$startup?->insta_link }}</td>
            <td>{{$startup?->linkedIn_link }}</td>
            <td>{{$startup?->logo }}</td>
        </tr>
    @endforeach
    </tbody>
</table>