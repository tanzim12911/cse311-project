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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id('stat_id');
            $table->foreignId('player_id')->references('player_id')->on('players')->onDelete('cascade');
            $table->integer('appearances');
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->bigInteger('clean_sheets')->default(0);
            $table->integer('yellow_cards')->default(0);
            $table->integer('red_cards')->default(0);
            $table->softDeletes();
            $table->timeStamps();$table->primary('stat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
