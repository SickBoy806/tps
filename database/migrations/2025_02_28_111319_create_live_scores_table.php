<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reverse the migrations.
     */
    public function up()
{
    Schema::create('live_scores', function (Blueprint $table) {
        $table->id();
        $table->string('sport_type');
        $table->string('team1');
        $table->string('team2');
        $table->string('score1')->nullable();
        $table->string('score2')->nullable();
        $table->string('status')->default('upcoming'); // upcoming, live, completed
        $table->timestamps();
    });
}
};