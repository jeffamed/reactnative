<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/vendedor','VendedorController@index')->name('vendedor.index');
Route::middleware('auth:api')->post('/vendedor/registrar','VendedorController@store')->name('vendedor.store');
Route::middleware('auth:api')->put('/vendedor/actualizar','VendedorController@update')->name('vendedor.update');
Route::middleware('auth:api')->put('/vendedor/desactivar','VendedorController@desactivar')->name('vendedor.inactive');
Route::middleware('auth:api')->put('/vendedor/activar','VendedorController@activar')->name('vendedor.active');
Route::middleware('auth:api')->get('/vendedor/seleccionarvendedor','VendedorController@seleccionar');

