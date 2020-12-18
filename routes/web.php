<?php

use App\Http\Controllers\PaymentController;
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
    return view('index');
});

Route::get('/payment', 'PaymentController@index');

//Payment CRUD Operation
Route::get('/payment/create', 'PaymentController@create');
Route:: post('/payment', 'PaymentController@store');
Route:: delete('/payment/{payment}', 'PaymentController@destroy');
Route:: get('/payment/{payment}/edit', 'PaymentController@edit');
Route:: patch('/payment/{payment}', 'PaymentController@update');
