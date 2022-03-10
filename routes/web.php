<?php

use App\Http\Controllers\{
    UserController
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

Route::controller(UserController::class)
    ->name('auth.')->prefix('auth')->group(function(){
        Route::get('/', 'index')->name('login');
        Route::post('/do', 'authenticate')->name('authenticate');
        Route::get('/password', 'password')->name('password');
        Route::get('/register', 'register')->name('register');
        Route::post('/register/do', 'registerAdd')->name('registerAdd');

});
