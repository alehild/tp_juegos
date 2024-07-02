<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Juegos</title>

    <script src="https://kit.fontawesome.com/ec7c892af7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    @include('blade/partials/nav')
    <div class="container">
        <h1>Tienda de Juegos</h1>
        
        <div class="text-center mb-4">
            <a href="{{ route('juegos.index', ['filter' => 'PS4']) }}" class="btn btn-primary">PS4</a>
            <a href="{{ route('juegos.index', ['filter' => 'PS5']) }}" class="btn btn-primary">PS5</a>
            <a href="{{ route('juegos.index', ['filter' => 'PC']) }}" class="btn btn-primary">PC</a>
            <a href="{{ route('juegos.index', ['filter' => 'Xbox']) }}" class="btn btn-primary">Xbox</a>
            <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Mostrar Todos</a>
        </div>

        <ul class="game-grid">
            @foreach ($games as $game)
                <li class="game-item">
                    <a href="{{ route('juegos.show', $game->id) }}">
                        <img src="{{ asset($game->imagen) }}" alt="{{ $game->nombre }}">
                        <div class="game-name">{{ $game->titulo }}</div>
                        <div class="game-price">${{ $game->precio }}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @include('blade/partials/footer')
</body>
</html>
