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
    @foreach($hubs as $hub)
        <tr>
            <td>{{$hub?->name }}</td>
            <td>{{$hub?->num_of_investment }}</td>
            <td>{{$hub?->country?->country_name }}</td>
            <td>{{$hub?->industry?->name }}</td>
            <td>{{$hub?->about }}</td>
            <td>{{$hub?->address }}</td>
            <td>{{$hub?->year_launched }}</td>
            <td>{{$hub?->web_link }}</td>
            <td>{{$hub?->logo }}</td>
        </tr>
    @endforeach
    </tbody>
</table>