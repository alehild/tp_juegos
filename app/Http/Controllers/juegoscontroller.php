<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class juegoscontroller extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        
        if ($filter) {
            $games = Game::where('consola', $filter)->get();
        } else {
            $games = Game::all();
        }

        return view('web.juegos.index', compact('games'));
    }

    public function show($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return redirect()->route('error');
        }

        return view('web.juegos.show', compact('game'));
    }

    public function create()
    {
        return view('web.juegos.create');
    }

    public function store(Request $request)
    {
        // Validar form
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'año' => 'required|numeric',
            'consola' => 'required|string',
            'imagen' => 'required|string',
        ]);

        // Crear un nuevo juego
        $game = new Game();
        $game->id = $request->id;
        $game->titulo = $request->titulo;
        $game->descripcion = $request->descripcion;
        $game->precio = $request->precio;
        $game->año = $request->año;
        $game->consola = $request->consola;
        $game->imagen = $request->imagen;

        // Guardar el juego en la base de datos
        $game->save();

        return redirect()->route('juegos.index');
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if ($game) {
            $game->delete();
        }

        return redirect()->route('juegos.index');
    }
}
