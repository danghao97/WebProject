<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserchallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userchallenge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->integer('idquestion')->unsigned();
            $table->foreign('idquestion')->references('id')->on('question')->onDelete('cascade');
            $table->integer('answered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userchallenge');
    }
}
