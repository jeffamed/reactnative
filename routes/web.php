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

Route::get('/cliente','ClienteController@index',['middleware' => 'csrf'])->name('cliente.index');
Route::post('/cliente/registrar','ClienteController@store')->name('cliente.store');
Route::put('/cliente/actualizar','ClienteController@update')->name('cliente.update');
Route::put('/cliente/desactivar','ClienteController@desactivar')->name('cliente.inactive');
Route::put('/cliente/activar','ClienteController@activar')->name('cliente.active');
Route::get('/cliente/seleccionarCliente','ClienteController@seleccionar');

Route::get('/vendedor','VendedorController@index',['middleware' => 'csrf'])->name('vendedor.index');
Route::post('/vendedor/registrar','VendedorController@store',['middleware' => 'csrf'])->name('vendedor.store');
Route::put('/vendedor/actualizar','VendedorController@update')->name('vendedor.update');
Route::put('/vendedor/desactivar','VendedorController@desactivar')->name('vendedor.inactive');
Route::put('/vendedor/activar','VendedorController@activar')->name('vendedor.active');
Route::get('/vendedor/seleccionarvendedor','VendedorController@seleccionar');

