<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id('match_id');
            $table->foreignId('competition_id')->references('competition_id')->on('competitions')->onDelete('cascade');
            $table->foreignId('team_id_home')->references('team_id')->on('teams')->onDelete('cascade');
            $table->foreignId('team_id_away')->references('team_id')->on('teams')->onDelete('cascade');
            $table->dateTime('date');
            $table->string('venue', 255);
            $table->enum('status', ['upcoming', 'finished', 'in-progress']);
            $table->softDeletes();
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
