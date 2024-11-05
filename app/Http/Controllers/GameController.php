<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
$genres = $games->pluck('genre')->unique()->sort()->values(); // Get unique genres
return view('games.index', compact('games', 'genres'));
    }
}



