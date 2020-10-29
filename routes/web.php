<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrosController;

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
Route::group(['middleware' => 'web'], function(){

    Route::get('/', function () {
        return view('/auth/login');
    });   
    Auth::routes();  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/cadastros', [App\Http\Controllers\CadastrosController::class, 'index'])->name('list');

Route::get('/cadastros/novo', [CadastrosController::class, 'novo']);
Route::post('/cadastros/add', [CadastrosController::class, 'add']);
Route::post('/cadastros/update/{id}', [CadastrosController::class, 'update']);
Route::delete('/cadastros/delete/{id}', [CadastrosController::class, 'delete']);
Route::get('/cadastros/{id}/edit', [CadastrosController::class, 'edit']);