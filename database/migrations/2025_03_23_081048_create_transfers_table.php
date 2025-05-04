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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id('player_id');
            $table->foreignId('from_team_id')->references('team_id')->on('teams')->onDelete('cascade');
            $table->foreignId('to_team_id')->references('team_id')->on('teams')->onDelete('cascade');
            $table->date('transfer_date');
            $table->integer('transfer_fee');
            $table->softDeletes();
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
