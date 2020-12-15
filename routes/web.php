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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tickets', 'TicketController@index');

Route::get('/tickets/user', 'TicketController@indexUser');

Route::get('/tickets/create', 'TicketController@create');

Route::get('/tickets/{id}', 'TicketController@show');

Route::patch('/tickets/{id}', 'TicketController@update');

Route::post('/tickets', 'TicketController@store');

Route::post('/notes/store', 'NoteController@store');
