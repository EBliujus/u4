<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ClientController extends Controller
{

    public function index()
    {
        // duomenu nuskaitymas is duomenu bazes ir klientu sudejimas i kintamaji Clients, nuskaitymas ir sudejimas yra vienoje komandoje
        $clients = Client::all()->sortBy('surname');

        return view('clients.index', [
            'clients' => $clients
        ]);

    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'pid' => 'required|integer|unique:clients,pid|min:11',
        ]);

        if ($validator->fails()) {
            $request-> flash();
            return redirect()
                        ->back()
                        ->withErrors($validator);
        }


        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->pid = $request->pid;
        $client->iban = 'LT' . rand(50,60) . 11000 . rand(10000000000,99999999999);
        $client->balance = 0;
        $client->save();
        return redirect()
        ->route('clients-index');
    }


    public function show(Client $client)
    {
        return view('clients.show',[
            'client' => $client
        ]);
    }


    public function edit(Client $client)
    {
        return view('clients.edit',[
            'client' => $client
        ]);
    }


    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|min:3',
            'surname' => 'nullable|min:3',
            'pid' => 'nullable|min:11',
        ]);

        if ($validator->fails()) {
            $request-> flash();
            return redirect()
                        ->back()
                        ->withErrors($validator);
        }

        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->pid = $request->pid;
        $client->iban = $request->iban;
        $client->balance = 0;
        $client->save();
        return redirect()
        ->route('clients-index')
        ->with('info', 'Client info was updated');
    }


    public function destroy(Client $client)
    {
        if ($client->balance != 0) {
            //Jei klientas turi pinigu redirectinti atgal su pranesimu
            return redirect()
                ->back()
                ->with('info', 'Cannot delete client - there is money in account.');
        } else {
            // jei klientas turi 0 pinigu istrinti ir redirectinti i index su success pranesimu
            $client->delete();
            return redirect()
                ->route('clients-index')
                ->with('ok', 'Client was deleted');
        }
    }
    public function addMoney(Request $request, Client $client)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);
    
        $client->balance += $request->amount;
        $client->save();
    
        return redirect()->route('clients-show', $client)->with('ok', 'Money added successfully.');
    }
    
    public function withdrawMoney(Request $request, Client $client)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01|max:' . $client->balance,
        ]);
    
        $client->balance -= $request->amount;
        $client->save();
    
        return redirect()->route('clients-show', $client)->with('info', 'Money withdrawn successfully.');
    }
}
