@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Client</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-store')}}" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Surname</label>
                            <input type="text" class="form-control" name="surname" value="{{old('surname')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client ID</label>
                            <input type="text" class="form-control" name="pid" value="{{old('pid')}}">
                        </div>
                        <div class="mb-3">
                            <label hidden class="form-label">Account Nr.</label>
                            <input hidden type="text" class="form-control" name="iban" value="{{old('')}}">
                        </div>                        
                        <div class="mb-3">
                            <label hidden class="form-label">Balance</label>
                            <input hidden type="text" class="form-control" name="balance" value="0">
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