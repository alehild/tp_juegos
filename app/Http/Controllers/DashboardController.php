<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class DashboardController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('dashboard', ['games' => $games]);
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if ($game) {
            $game->delete();
            return redirect()->route('dashboard')->with('success', 'Juego eliminado correctamente.');
        }

        return redirect()->route('dashboard')->with('error', 'Juego no encontrado.');
    }

    
    public function store(Request $request)
    {


        // Crear un nuevo juego
        $game = new Game();
        $game->id =$request->id;
        $game->titulo = $request->titulo;
        $game->descripcion = $request->descripcion;
        $game->precio = $request->precio;
        $game->year = $request->year;
        $game->consola = $request->consola;
        $game->imagen = $request->imagen;


        $game->save();


        return redirect()->route('juegos.index');

        }

    public function edit($id)
    {
        $game = Game::find($id);

        if ($game) {
            return view('edit', ['game' => $game]);
        }

        return redirect()->route('dashboard')->with('error', 'Juego no encontrado.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'year' => 'required|integer',
            'consola' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
        ]);

        $game = Game::find($id);

        if ($game) {
            $game->titulo = $request->titulo;
            $game->descripcion = $request->descripcion;
            $game->precio = $request->precio;
            $game->year = $request->year;
            $game->consola = $request->consola;
            $game->imagen = $request->imagen;
            $game->save();

            return redirect()->route('dashboard')->with('success', 'Juego actualizado correctamente.');
        }

        return redirect()->route('dashboard')->with('error', 'Juego no encontrado.');
    }

    
}
