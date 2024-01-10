<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioRestController ;
use App\Http\Controllers\UserRestController;
use App\Http\Controllers\TipoServicioRestController;
use App\Http\Controllers\NegocioRestController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailLabel;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Servicio
Route::get('/servicio',[ServicioRestController::class,'index']);
Route::post('/servicio',[ServicioRestController::class,'store']);
Route::get('/servicio/{servicio}',[ServicioRestController::class,'show']);
Route::put('/servicio/{servicio}',[ServicioRestController::class,'update']);
Route::delete('/servicio/{servicio}',[ServicioRestController::class,'destroy']);
//negocio
Route::get('/negocio',[NegocioRestController::class,'index']);
Route::post('/nwgocio',[NegocioRestController::class,'store']);
Route::get('/negocio/{negocio}',[NegocioRestController::class,'show']);
Route::put('/negocio/{service}',[NegocioRestController::class,'update']);
Route::delete('/negocio/{negocio}',[NegocioRestController::class,'destroy']);
//TipoServicio
Route::get('/tipo_servicios',[TipoServicioRestController::class,'index']);
Route::get('/tipo_servicios/{tservicio}',[TipoServicioRestController::class,'show']);
Route::post('/tipo_servicios',[TipoServicioRestController::class,'store']);
Route::put('/tipo_servicios/{tservicio}',[TipoServicioRestController::class,'update']);
Route::delete('/tipo_servicios/{tservicio}',[TipoServicioRestController::class,'destroy']);
//Usuario
Route::get('/user',[UserRestController::class,'index']);
Route::get('/user/{user}',[UserRestController::class,'show']);
Route::post('/user',[UserRestController::class,'store']);
Route::put('/user/{user}',[UserRestController::class,'update']);
Route::delete('/user/{user}',[UserRestController::class,'destroy']);
//Role
Route::get('/role',[UserRestController::class,'index']);
Route::get('/role/{role}',[UserRestController::class,'show']);
Route::post('/role',[UserRestController::class,'store']);
//Role has User
Route::get('usertorole/{user}',[UserRestController::class,'showRolesToUser']);
Route::post('/usertorole/{user}/{role}',[UserRestController::class,'storeRoletoUser']);
Route::put('usertorole/{user}',[UserRestController::class,'updateRoleToUser']);
Route::delete('/usertorole/{user}/{role}',[UserRestController::class,'storeRoletoUser']);

Route::get('/contactanos', function ()
{
    Mail::to('sulroca@gmail.com')->send(new ContactanosMailLabel);
    return "Correo enviado desde Laravel";
})->name('contactanos');

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
