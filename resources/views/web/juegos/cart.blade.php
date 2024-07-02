<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/style.css">
</head>
<body>
    @include('blade/partials/nav')

    <div class="container mt-4">
        @auth
            <h2>Carrito de Compras</h2>

         
            @if($cart)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr>
                                <td><img src="{{ asset($details['image']) }}" width="50" height="50" alt="{{ $details['title'] }}"></td>
                                <td>{{ $details['title'] }}</td>
                                <td>${{ $details['price'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>${{ $details['price'] * $details['quantity'] }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    <h3>Total: ${{ $total }}</h3>
                </div>
            @else
                <div class="alert alert-info">El carrito está vacío.</div>
            @endif

            <div class="mt-4">
                <a href="/juegos" class="btn btn-primary">Seguir Comprando</a>
                <a href="/checkout" class="btn btn-success">Proceder al Pago</a>
            </div>
        @else
            
        @endauth
    </div>

    @include('blade/partials/footer')
</body>
</html>