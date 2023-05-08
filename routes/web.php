<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SeriesController;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');
Route::get('/registrar', [AuthController::class, 'showRegistroForm'])->name('auth.registrar');

//rotas login e logout
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//rota de salvar registro
Route::post('/salvar/registro', [AuthController::class, 'registrar'])->name('registrar');

//todas as rotas dentro de middleware estão bloqueadas e requerem autenticação pra ser acessadas
Route::middleware(['auth'])->group(function () {

    //rota para o home
    Route::get('/series', [SeriesController::class, 'index'])->name('series.index');

    //rotas da page criar serie e salvar serie
    Route::get('/series/criar', [SeriesController::class, 'create'])->name('series.create');
    Route::post('/series/salvar', [SeriesController::class, 'store']);

    //rota da page confirmar atualização e atualizar
    Route::get('/series/update/{id}', [SeriesController::class, 'editar'])->name('series.pageUpdate');
    Route::put('/series/update/confirmar/{id}', [SeriesController::class, 'atualizar'])->name('series.update');

    //rota da page confirmar o delete e a rota de deletar
    Route::get('/series/remover/{id}/confirmar', [SeriesController::class, 'confirmDelete'])->name('series.confirmDelete');
    Route::delete('/series/remover/{id}',  [SeriesController::class, 'remover'])->name('series.delete');

    //rota para vizualizar um serie em especifico
    Route::get('/series/visualizar/{id}',  [SeriesController::class, 'read'])->name('series.visualizar');

});
