<?php

use App\Http\Controllers\{
    Login
};
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::controller(Login::class)
    ->name('login.')->prefix('login')->group(function(){
        Route::get('/', 'index')->name('login');
});
