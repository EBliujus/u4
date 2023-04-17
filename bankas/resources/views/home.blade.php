@extends('layouts.app')

@section('content')
    <table class="table col-12">
        <thead>
            <tr>
                <th scope="col">Number of Clients</th>
                <th scope="col">Total Accounts</th>
                <th scope="col">Total Funds</th>
                <th scope="col">Biggest Amount of Cash</th>
                <th scope="col">Average Sum in Accounts </th>
                <th scope="col">Accounts with 0 balance</th>
                <th scope="col">Accounts with Negative balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{ $clients }} </td>
                <td> {{ $IBANs }} </td>
                <td> {{ $totalBalance }} </td>
                <td> {{ $maxBalance }} </td>
                <td> {{ $avgBalance }} </td>
                <td> 0 </td>
                <td> 0 </td>
            </tr>
        </tbody>
    </table>
@endsection
