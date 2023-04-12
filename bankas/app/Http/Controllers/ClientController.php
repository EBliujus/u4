<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ClientController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->pid = $request->pid;
        $client->iban = 'LT' . rand(50,60) . 11000 . rand(10000000000,99999999999);
        $client->balance = 0;
        $client->save();
        redirect()->back();
    }


    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        //
    }


    public function update(Request $request, Client $client)
    {
        //
    }


    public function destroy(Client $client)
    {
        //
    }
}
