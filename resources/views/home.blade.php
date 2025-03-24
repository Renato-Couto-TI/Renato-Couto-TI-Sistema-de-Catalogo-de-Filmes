@extends('layouts.main_layout')

@section('content')
<div class="home-container">
    <div class="logout-container">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Sair</button>
        </form>                
    </div>

    <div>
        <a href="{{ route('home') }}">
            <button class="bt-home">
                <span class="icon-home"></span> Página Inicial
            </button>
        </a>
    </div>

    <h1>Bem-vindo ao Catálogo de Filmes!</h1>
    <br></br>
    <br></br>
        
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif    
            
    <form action="{{ route('home') }}" method="GET">
        <div class="filtros-de-busca">            
            <input type="text" name="nome_filme" placeholder="Buscar filme..." value="{{ request('nome_filme') ? request('nome_filme') : '' }}">
            
            <select name="categoria">
                <option value="">Selecione a categoria</option>
                <option value="Ação" {{ request('categoria') == 'Ação' ? 'selected' : '' }}>Ação</option>
                <option value="Aventura" {{ request('categoria') == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                <option value="Suspense" {{ request('categoria') == 'Suspense' ? 'selected' : '' }}>Suspense</option>
                <option value="Ficcao" {{ request('categoria') == 'Ficcao' ? 'selected' : '' }}>Ficção</option>
                <option value="Infantil" {{ request('categoria') == 'Infantil' ? 'selected' : '' }}>Infantil</option>
                <option value="Animacao" {{ request('categoria') == 'Animacao' ? 'selected' : '' }}>Animação</option>
                <option value="Comedia" {{ request('categoria') == 'Comedia' ? 'selected' : '' }}>Comédia</option>
                <option value="Romance" {{ request('categoria') == 'Romance' ? 'selected' : '' }}>Romance</option>                
            </select>
            
            <input type="text" name="ano_lancamento" placeholder="Ano de lançamento" value="{{ request('ano_lancamento') ? request('ano_lancamento') : '' }}">
            
            <button type="submit">Buscar</button>
        </div>
    </form>

    <div class="botao-cadastrar-filme">
        <a href="{{ route('filme.novo') }}">
            <button class="bt-cadastrar">Cadastrar Novo Filme</button>
        </a>
    </div>
    
    <div class="filmes-lista">
        @foreach($filmes as $filme)
            <div class="filme-card">
                <div class="filme-imagem">
                    <h2>{{ $filme->nome_filme }}</h2>
                    
                    @if($filme->imagem)
                        <img src="{{ asset($filme->imagem) }}" alt="{{ $filme->nome_filme }}" style="width: 200px; height: auto;">
                    @else                        
                        <img src="{{ asset('assets/images/filmes/default.jpg') }}" alt="Imagem padrão">
                    @endif
                    
                    <p>Categoria: {{ $filme->categoria }}</p>
                    <p>Ano: {{ $filme->ano_lancamento }}</p>
                    <p>{{ $filme->descricao }}</p>

                    <div>
                        <a href="{{ route('filme.editar', $filme->id) }}">Editar</a>
                                        
                        <form action="{{ route('filme.excluir', $filme->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </div>
                </div>
               
            </div>  
        @endforeach
    </div>

    <!-- Elemento de Paginação que inseri -->    
    <div class="paginacao">
        {{ $filmes->links() }}
    </div>
</div>

<script>
    window.onload = function() {
        document.querySelector('input[name="nome_filme"]').value = '';
        document.querySelector('input[name="ano_lancamento"]').value = '';
        document.querySelector('select[name="categoria"]').value = '';
    };
</script>

@endsection
