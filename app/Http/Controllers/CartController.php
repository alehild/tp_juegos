<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; // Asegúrate de importar el modelo Game

class CartController extends Controller
{
    public function add($id)
    
    {
        $game = Game::find($id);

        if ($game) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "title" => $game->titulo,
                    "quantity" => 1,
                    "price" => $game->precio,
                    "image" => $game->imagen
                ];
            }

            session()->put('cart', $cart);

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('web.juegos.cart', compact('cart', 'total'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }
}
