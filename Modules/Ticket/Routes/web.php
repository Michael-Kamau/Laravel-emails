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

Route::group(['prefix'=> '/ticket','as'=>'ticket::'] ,function() {

    Route::get('/', 'TicketController@index')->name('mail-form');

    Route::get('/emails', [\Modules\Ticket\Http\Controllers\TicketController::class, 'emails'])->name('all-mail');


    Route::post('/send-email', [\Modules\Ticket\Http\Controllers\TicketController::class, 'sendEmail'])->name('send-email');


    Route::post('/reply-email', [\Modules\Ticket\Http\Controllers\TicketController::class, 'replyEmail'])->name('reply-email');


    Route::get('/send-email/{messageId?}', [\Modules\Ticket\Http\Controllers\TicketController::class, 'sendEmail']);

});
