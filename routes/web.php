<?php

use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('produtos.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/produtos', [PedidosController::class, 'index']);
Route::get('/produtos/lista', [PedidosController::class, 'produtos']);
Route::post('/produtos', [PedidosController::class, 'store'])->name('pedidos.store');
