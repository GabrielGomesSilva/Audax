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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/usuarios', 'App\Http\Controllers\BookController@index')->middleware(['auth']);
Route::get('/home', 'App\Http\Controllers\BookController@index')->middleware(['auth']);

Route::post('/usuarios/pesquisa', 'App\Http\Controllers\BookController@pesquisa')->middleware(['auth'])->name('usuarios.pesquisa');
Route::get('/usuarios/create', 'App\Http\Controllers\BookController@create')->middleware(['auth']);
Route::post('/usuarios/store', 'App\Http\Controllers\BookController@store')->middleware(['auth']);
Route::post('/usuarios/{id}', 'App\Http\Controllers\BookController@update')->middleware(['auth']);
Route::delete('/usuarios/{id}', 'App\Http\Controllers\BookController@destroy')->name('usuarios.destroy')->middleware(['auth']);
Route::get('/usuarios/{id}/edit', 'App\Http\Controllers\BookController@edit')->middleware(['auth']);

Route::get('/materiais', 'App\Http\Controllers\MateriaisController@index')->middleware(['auth']);;
Route::post('/materiais/store', 'App\Http\Controllers\MateriaisController@store')->middleware(['auth']);;
Route::get('/materiais/create', 'App\Http\Controllers\MateriaisController@create')->middleware(['auth']);;
Route::get('/materiais/{id}/edit', 'App\Http\Controllers\MateriaisController@edit')->name('materiais.edit')->middleware(['auth']);
Route::post('/materiais/{id}', 'App\Http\Controllers\MateriaisController@update')->name('materiais.update')->middleware(['auth']);
Route::delete('/materiais/{id}', 'App\Http\Controllers\MateriaisController@destroy')->name('materiais.destroy')->middleware(['auth']);

//Route::get('/home', 'App\Http\Controllers\SolicitacaoController@index');
Route::get('/solicitacao', 'App\Http\Controllers\SolicitacaoController@index')->middleware(['auth']);
Route::get('/solicitacao/create', 'App\Http\Controllers\SolicitacaoController@create')->middleware(['auth']);
Route::post('/solicitacao/store', 'App\Http\Controllers\SolicitacaoController@store')->name('solicitacao.store')->middleware(['auth']);
