<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge', function (Blueprint $table) {
            $table->dateTime('created_at');
            $table->string('player1');
            $table->string('player2');
            $table->primary(['created_at', 'player1','player2']);
            $table->string('test_id');
            $table->smallInteger('player1_score');
            $table->smallInteger('player2_score');
            $table->boolean('player1_done')->default(false);
            $table->boolean('player2_done')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge');
    }
}
