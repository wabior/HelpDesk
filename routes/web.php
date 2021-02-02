<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/users', 'UserController@index');

Route::get('/tickets', 'TicketController@index')->name('tickets_all');

Route::get('/tickets/user', 'TicketController@indexUser')->name('tickets_user');

Route::get('/tickets/create', 'TicketController@create');

Route::get('/tickets/{id}', 'TicketController@show');

Route::patch('/tickets/{id}', 'TicketController@update');

Route::post('/tickets', 'TicketController@store');

Route::post('/notes/store', 'NoteController@store');
