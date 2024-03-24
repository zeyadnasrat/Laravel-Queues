<?php

use App\Jobs\ReconcileAccount;
use App\Models\User;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Route;

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

    $pipeline = app(Pipeline::class);

    $pipeline->send('test test')
        ->through([
            ReconcileAccount::class
        ])
        ->then(function ($string){
            dd($string);
        });

    return 'DOne';
});
