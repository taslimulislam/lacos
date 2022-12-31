<table>
    <thead>
    <tr>
        <th>company_name</th>
        <th>industry</th>
        <th>country</th>
        <th>investor_type</th>
        <th>investment_stage</th>
        <th>investment_exit</th>
        <th>about</th>
        <th>web_link</th>
        <th>year_founded</th>
        <th>logo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($investor as $inv)
        <tr>
        <td>{{$inv?->company_name }}</td>
        <td>{{$inv?->industry?->name }}</td>
        <td>{{$inv?->country?->country_name }}</td>
        <td>{{$inv?->investorType?->name }}</td>
        <td>{{$inv?->investmentStage?->name }}</td>
        <td>{{$inv?->investmentExit?->name }}</td>
        <td>{{$inv?->about }}</td>
        <td>{{$inv?->web_link }}</td>
        <td>{{$inv?->year_founded }}</td>
        <td>{{$inv?->logo }}</td>
        </tr>
    @endforeach
    </tbody>
</table>