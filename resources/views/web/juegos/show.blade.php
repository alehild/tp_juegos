<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->titulo }}</title>

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
        <div class="game-info">
            <div class="poster">
                <img src="{{ asset($game->imagen) }}" alt="{{ $game->nombre }}">
            </div>
            <div class="game-details">
                <div class="game-name"><h1>{{ $game->titulo }}</h1></div>
                <div class="game-price">${{ $game->precio }},00</div>
                <div class="game-description"><p>{{ $game->descripcion }}</p></div>
            </div>
        </div>

        <div class="button-container">
            @guest <!-- si no in sec qe valla a login  -->
                <form action="/login">
                    <button type="submit" class="btn btn-primary">Agregar a Carrito</button>
                </form>
            @else
                <form action="{{ route('cart.add', $game->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Agregar a Carrito</button>
                </form>
            @endguest

            <form action="/juegos">
                <button type="submit" class="btn btn-secondary">Seguir comprando</button>
            </form>
        </div>
    </div>
    
    @include('blade/partials/footer')
</body>
</html>