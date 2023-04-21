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
        Accounts::create([
            'iban' => $request->iban,
            'balance' => $request->balance,
            'client_id' => $request->client_id
        ]);
        return redirect()->back();
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
