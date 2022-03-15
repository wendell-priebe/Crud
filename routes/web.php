<?php

use App\Http\Controllers\{
    UserController,
    ClientsController
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.index');
});

Route::get('/home', function () {
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

Route::controller(ClientsController::class)
    ->name('clients.')->prefix('clients')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::get('/{id}', 'show')->name('show'); // É importante passar a rota com parametros por ultimo

});

// index – Lista os dados da tabela
// show – Mostra um item específco
// create – Retorna a View para criar um item da tabela
// store – Salva o novo item na tabela
// edit – Retorna a View para edição do dado
// update – Salva a atualização do dado
// destroy – Remove o dado