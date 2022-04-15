<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NABAPI;
use App\Http\Controllers\ANZAPI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('homepage');
});

Route::post('/nab.com', [NABAPI::class, 'request']);
Route::post('/anz.com', [ANZAPI::class, 'request']);
