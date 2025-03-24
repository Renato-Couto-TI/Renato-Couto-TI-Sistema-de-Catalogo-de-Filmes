@extends('layouts.main_layout')

@section('content')
    <div class="login-container">
        <div class="login-card">
            
            <div class="logo-container">
                <img src="assets/images/logo.jpg" alt="Catalogo de Filmes" class="logo">
            </div>

            <form action="{{ url('/loginSubmit') }}" method="POST" novalidate>
                @csrf
                <div class="campos-input">
                    <label for="text_username">Nome de Usuário</label>
                    <input type="email" name="text_username" id="text_username" required value="{{ old('text_username') }}">
                    @error('text_username')
                        <div class="aviso-erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="campos-input">
                    <label for="text_password">Senha</label>
                    <input type="password" name="text_password" id="text_password" required>
                    @error('text_password')
                        <div class="aviso-erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="botao-submit">
                    <button type="submit">LOGIN</button>
                </div>
            </form>

            @if(session('loginError'))
                <div class="alert-warning text-center">
                    {{ session('loginError') }}        
                </div>
            @endif
                        
        </div>
    </div>
@endsection
