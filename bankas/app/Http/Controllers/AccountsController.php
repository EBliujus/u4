<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = accounts::all();
        return view('accounts.index',[
            'accounts' => $accounts
        ]);
    }

    public function create()
    {
        $clients = Client::all();
        return view('accounts.create',[
            'clients' => $clients
        ]);
    }

    public function store(Request $request)
    {
        $iban = 'LT' . rand(50,60) . 11000 . rand(10000000000,99999999999);  
        Accounts::create([
            'iban' => $iban,
            'balance' => 0,
            'client_id' => $request->client_id
        ]);
        return redirect()
        ->route('accounts-create')
        ->with('iban', $iban);
    }

    public function show(Accounts $accounts)
    {
        //
    }

    public function edit(Accounts $accounts)
    {
        //
    }

    public function update(Request $request, Accounts $accounts)
    {
        //
    }

    public function destroy(Accounts $accounts)
    {
        //
    }
}
