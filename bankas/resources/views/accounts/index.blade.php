@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Accounts List</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id Nr.</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Personal Id</th>
                                <th>Account Nr.</th>
                                <th>Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>  
                            @forelse ($accounts as $account) 
                                <tr>
                                    <td>{{ $accounts->iban }}</td>
                                    <td>{{ $accounts->balance }}</td>
                                    <td>
                                        <div class="myg-container">
                                            <a href="{{route('accounts-show', $accounts)}}" class="btn btn-info">Show</a>
                                            <a href="{{route('accounts-edit', $accounts)}}" class="btn btn-success">Edit</a>
                                            <form action="{{route('accounts-delete', $client)}}" method="post">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <div class="card-body">
                                <div class="noAcc col-12">Empty chart</div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection