@extends('layouts.main_layout')

@section('content')
<div class="container editar-filme">
    <div class="titulo-formulario">
        <h1>Editar Filme{{ $filme->nome }}</h1>
    </div>
        
    @if ($errors->any())
        <div class="alert alert-danger aviso-erro">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('filme.atualizar', $filme->id) }}" enctype="multipart/form-data" class="form-editar-filme">
        @csrf
        @method('PUT')
    
        <div class="campo-form">
            <label for="nome_filme">Nome</label>
            <input type="text" name="nome_filme" id="nome_filme" value="{{ old('nome_filme', $filme->nome_filme) }}" required>
        </div>
    
        <div class="campo-form">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" required>
                <option value="ação" {{ old('categoria', $filme->categoria) == 'ação' ? 'selected' : '' }}>Ação</option>
                <option value="aventura" {{ old('categoria', $filme->categoria) == 'aventura' ? 'selected' : '' }}>Aventura</option>
                <option value="suspense" {{ old('categoria', $filme->categoria) == 'suspense' ? 'selected' : '' }}>Suspense</option>
                <option value="Ficcao" {{ old('categoria', $filme->categoria) == 'Ficcao' ? 'selected' : '' }}>Ficção</option>
                <option value="infantil" {{ old('categoria', $filme->categoria) == 'infantil' ? 'selected' : '' }}>Infantil</option>
                <option value="animação" {{ old('categoria', $filme->categoria) == 'animação' ? 'selected' : '' }}>Animação</option>                
                <option value="Comedia" {{ old('categoria', $filme->categoria) == 'Comedia' ? 'selected' : '' }}>Comédia</option>
                <option value="Romance" {{ old('categoria', $filme->categoria) == 'Romance' ? 'selected' : '' }}>Romance</option>
            </select>
        </div>
    
        <div class="campo-form">
            <label for="ano_lancamento">Ano de Lançamento</label>
            <input type="number" name="ano_lancamento" id="ano_lancamento" value="{{ old('ano_lancamento', $filme->ano_lancamento) }}" required>
        </div>
    
        <div class="campo-form">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" required>{{ old('descricao', $filme->descricao) }}</textarea>
        </div>
            
        @if($filme->imagem)
            <div class="campo-form">
                <label>Imagem Atual</label><br>
                <img src="{{ asset($filme->imagem) }}" alt="Imagem do Filme" style="width: 200px;">
            </div>
        @endif
            
        <div class="campo-form">
            <label for="imagem">Alterar Imagem</label>
            <input type="file" name="imagem" id="imagem">
        </div>
    
        <div class="campo-form">
            <button type="submit" class="btn btn-success">Atualizar Filme</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
