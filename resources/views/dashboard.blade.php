<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Juegos</title>
    <script src="https://kit.fontawesome.com/ec7c892af7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/style.css">
    <script>
        function toggleVisibility(id) {
            var element = document.getElementById(id);
            if (element.style.display === 'none' || element.style.display === '') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    @include('blade/partials/nav')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Admin Juegos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <button class="btn btn-primary" onclick="toggleVisibility('listaJuegos')">Lista de Juegos</button>
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="listaJuegos" class="py-12" style="display: none;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($games as $game)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->titulo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ $game->precio }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->descripcion }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('juegos.destroy', $game->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="eliminar-btn">Eliminar</button>
                                            </form>
                                            <button class="btn btn-warning" onclick="toggleVisibility('editarJuego-{{ $game->id }}')">Editar</button>
                                        </td>
                                    </tr>
                                    <tr id="editarJuego-{{ $game->id }}" style="display: none;">
                                        <td colspan="5">
                                            <form action="{{ route('juegos.update', $game->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                                                    <input type="text" name="titulo" id="titulo" class="form-input mt-1 block w-full rounded-md shadow-sm" value="{{ $game->titulo }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                                                    <textarea name="descripcion" id="descripcion" class="form-textarea mt-1 block w-full rounded-md shadow-sm" required>{{ $game->descripcion }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                                                    <input type="number" name="precio" id="precio" class="form-input mt-1 block w-full rounded-md shadow-sm" value="{{ $game->precio }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Año</label>
                                                    <input type="number" name="year" id="year" class="form-input mt-1 block w-full rounded-md shadow-sm" value="{{ $game->year }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="consola" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Consola</label>
                                                    <select name="consola" id="consola" class="form-select mt-1 block w-full rounded-md shadow-sm" required>
                                                        <option value="PS4" {{ $game->consola == 'PS4' ? 'selected' : '' }}>PS4</option>
                                                        <option value="PS5" {{ $game->consola == 'PS5' ? 'selected' : '' }}>PS5</option>
                                                        <option value="PC" {{ $game->consola == 'PC' ? 'selected' : '' }}>PC</option>
                                                        <option value="Xbox" {{ $game->consola == 'Xbox' ? 'selected' : '' }}>Xbox</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL de la imagen</label>
                                                    <input type="text" name="imagen" id="imagen" class="form-input mt-1 block w-full rounded-md shadow-sm" value="{{ $game->imagen }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                                <button type="button" class="btn btn-secondary" onclick="toggleVisibility('editarJuego-{{ $game->id }}')">Cancelar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                        <button class="btn btn-secondary" onclick="toggleVisibility('agregarJuego')">Agregar Juego</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="agregarJuego" class="py-12" style="display: none;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>Agregar Juegos</h2>
                        <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                                <input type="number" name="id" id="id" class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-textarea mt-1 block w-full rounded-md shadow-sm" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Año</label>
                                <input type="number" name="year" id="year" class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="consola" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Consola</label>
                                <select name="consola" id="consola" class="form-select mt-1 block w-full rounded-md shadow-sm" required>
                                    <option value="PS4">PS4</option>
                                    <option value="PS5">PS5</option>
                                    <option value="PC">PC</option>
                                    <option value="Xbox">Xbox</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL de la imagen</label>
                                <input type="text" name="imagen" id="imagen" class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                            </div>
                            <button type="submit" class="agregar-btn">Agregar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


        
        @include('blade/partials/footer')
    </x-app-layout>
</body>
</html>
