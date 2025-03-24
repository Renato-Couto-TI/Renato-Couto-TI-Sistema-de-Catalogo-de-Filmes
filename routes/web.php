<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

//rotas de autenticação - *usuário não logado
Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);    
});

//rotas para o sistema interno - *Apenas para usuário não logado
Route::middleware([CheckIsLogged::class])->group(function() {
    // Rota para a página inicial (Home)
    Route::get('/', [MainController::class, 'index'])->name('home');
        
    // Rota para o fomulário de inserção dos dados de um novo filme
    Route::get('/filme/novo', [MainController::class, 'novoFilme'])->name('filme.novo');

    // Rota para cadastrar um novo filme (processa o formulário)
    Route::post('/filme/cadastrar', [MainController::class, 'cadastrarFilme'])->name('filme.cadastrar');

    // Rotas para editar um filme do catálogo
    Route::get('/filme/editar/{id}', [MainController::class, 'editarFilme'])->name('filme.editar');
    Route::put('/filme/editar/{id}', [MainController::class, 'atualizarFilme'])->name('filme.atualizar');

    // Rota para excluir um filme
    Route::delete('/filme/excluir/{id}', [MainController::class, 'excluirFilme'])->name('filme.excluir');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



