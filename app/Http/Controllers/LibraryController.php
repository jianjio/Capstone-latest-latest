<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function add(Request $request)
    {
        $request->validate(['game_id' => 'required|exists:games,id']);

        Library::create([
            'user_id' => Auth::id(),
            'game_id' => $request->game_id,
        ]);

        return back()->with('success', 'Game added to your library.');
    }

    public function remove(Request $request, $id)
    {
        Library::where('user_id', Auth::id())->where('game_id', $id)->delete();

        return back()->with('success', 'Game removed from your library.');
    }

    public function index()
    {
        $games = Library::where('user_id', Auth::id())->with('game')->get();
        return view('library.index', compact('games'));
    }
}
