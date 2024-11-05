<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'library'; // Ensure this is set if your table name is not plural
    protected $fillable = ['user_id', 'game_id'];

    // Define the relationship with the Game model
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
