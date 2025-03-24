@extends('layouts.main_layout')

@section('content')

<div class="titulo-formulario">
    <h1>Cadastro de Novo Filme</h1>
</div>

<form action="{{ route('filme.cadastrar') }}" method="POST" enctype="multipart/form-data" class="form-cadastro-filme">
    @csrf
    <div class="campo-form">
        <label for="nome_filme">Nome do Filme</label>
        <input type="text" name="nome_filme" required>
    </div>

    <div class="campo-form">
        <label for="categoria">Categoria</label>
        <input type="text" name="categoria" required>
    </div>

    <div class="campo-form">
        <label for="ano_lancamento">Ano de Lançamento</label>
        <input type="text" name="ano_lancamento" required>
    </div>

    <div class="campo-form">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" required></textarea>
    </div>

    <div class="campo-form">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" required>
    </div>

    <div class="campo-form">
        <button type="submit" class="botao-submit">Cadastrar Filme</button>
    </div>
</form>
@endsection

