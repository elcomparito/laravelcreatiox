<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\PostulacionController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

Personal access client created successfully.
Client ID: 1
Client secret: NQ9oHDYGdsa1hgfIHqsro8kKGnDkZHKUt4fGaQbQ
Password grant client created successfully.
Client ID: 2
Client secret: 4BeovRGK9IsAK5xV7ChAI16ei0pOO3OUQ5M0IlFx
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//**************** Ruta del LOGIN ********************//
//Route::post('/user/login', [AuthController::class, 'login']);
//Route::get('/user', [AuthController::class, 'logout'])->middleware('auth:api');
//Route::get('/users/obtenerUsuario', [AuthController::class, 'obtenerUsuario']);

/* Route::apiResource('area', AreaController::class)->middleware('auth:api');
Route::apiResource('oferta', OfertaController::class);
Route::apiResource('postulacion', PostulacionController::class)->middleware('auth:api'); */

Route::apiResource('area', AreaController::class);
Route::apiResource('postulacion', PostulacionController::class);
Route::get('postulacion/get-all-by-practicante/{id}', [PostulacionController::class, 'get_all_by_practicante']);

Route::group(['middleware' => ['auth']], function () {

});
