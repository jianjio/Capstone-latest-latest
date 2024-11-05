<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'title',
        'thumbnail',
        'short_description',
        'game_url',
        'genre',
        'platform',
        'release_date',
        'freetogame_profile_url',
        'category'
    ];

    protected $casts = [
        'release_date' => 'date',
    ];
}