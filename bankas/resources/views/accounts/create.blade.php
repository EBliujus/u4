@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Add Account</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('accounts-store') }}" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Account Nr.</label>
                                <input type="text" class="form-control" name="iban">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Balance</label>
                                <input type="text" class="form-control" name="balance">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select class="form-select" name="client_id">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }} {{ $client->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
