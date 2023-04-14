<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController as CC;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => '<h1>Home</h1>');

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('clients')->name('clients-')->group(function () {
    
    Route::get('/', [CC::class, 'index'])->name('index');   
    Route::get('/create', [CC::class, 'create'])->name('create');
    Route::post('/create', [CC::class, 'store'])->name('store');
    Route::get('/{client}', [CC::class, 'show'])->name('show');
    Route::get('/edit/{client}', [CC::class, 'edit'])->name('edit');
    Route::put('/edit/{client}', [CC::class, 'update'])->name('update');
    Route::delete('/delete/{client}', [CC::class, 'destroy'])->name('delete');
    Route::put('/add-money/{client}', [CC::class, 'addMoney'])->name('add-money');
    Route::put('/withdraw-money/{client}', [CC::class, 'withdrawMoney'])->name('withdraw-money');

});