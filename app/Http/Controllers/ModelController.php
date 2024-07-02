<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class ModelController extends Controller
{
   public function ejemplo() 
   {
    
    $games = Game::all();

    foreach ($games as $game){
        echo $game->titulo.'<br>';
    }

 /*  return Game::all();
*/
   }
}
