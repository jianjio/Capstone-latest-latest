<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->text('short_description')->nullable();
            $table->string('game_url');
            $table->string('genre', 100)->nullable();
            $table->string('platform', 100)->nullable();
            $table->string('publisher', 100)->nullable();
            $table->string('developer', 100)->nullable();
            $table->date('release_date')->nullable();
            $table->string('freetogame_profile_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
