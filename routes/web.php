<?php

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

Route::get('/ticket', 'TicketController@index')->name('ticket.index');
Route::post('/ticket/store', 'TicketController@storeOrder')->name('ticket.store');
Route::get('payment','PaymentController@paymentIndex')->name('payment.index');