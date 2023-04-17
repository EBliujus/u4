<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::count();
        $IBANs = Client::count('iban');
        $totalBalance = Client::sum('balance');
        $maxBalance = Client::max('balance');
        $avgBalance = number_format(Client::avg('balance'), 2);

        return view('home',
        [
            'clients' => $clients,
            'IBANs' => $IBANs,
            'totalBalance' => $totalBalance,
            'maxBalance' => $maxBalance,
            'avgBalance' => $avgBalance,
        ]);
    }
}
