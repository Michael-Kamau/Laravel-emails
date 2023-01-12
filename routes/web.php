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
Route::get('/emails', [\App\Http\Controllers\HomeController::class, 'emails']);


Route::post('/send-email', [\App\Http\Controllers\HomeController::class, 'sendEmail'])->name('send-email');


Route::post('/reply-email', [\App\Http\Controllers\HomeController::class, 'replyEmail'])->name('reply-email');


Route::get('/send-email/{messageId?}', [\App\Http\Controllers\HomeController::class, 'sendEmail']);


Route::get('/', function () {

    return view('welcome');
});
