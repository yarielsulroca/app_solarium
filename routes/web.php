<?php

use App\Mail\ContactanosMailLabel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/contactanos', function ()
{
    Mail::to('sulroca@gmail.com')->send(new ContactanosMailLabel);
    return "Correo enviado 2, desde Laravel";
})->name('contactanos');
