<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CATÁLOGO DE FILMES</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/jpg">
</head>
<body>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="conteudo-footer">
            <small>&copy; <?= date('Y') ?> Renato Couto - Catalogo de Filmes</small>
        </div>    
    </footer>

</body>
</html>

