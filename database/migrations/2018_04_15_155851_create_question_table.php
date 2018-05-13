<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtype')->length(2)->unsigned();
            $table->foreign('idtype')->references('idtype')->on('type')->onDelete('cascade');
            $table->integer('idlevel')->length(2)->unsigned();
            $table->foreign('idlevel')->references('idlevel')->on('level')->onDelete('cascade');
            $table->integer('idobject')->length(2)->unsigned();
            $table->foreign('idobject')->references('idobject')->on('object')->onDelete('cascade');
            $table->text('content');
            $table->text('answer1');
            $table->text('answer2');
            $table->text('answer3');
            $table->text('answer4');
            $table->integer('answer');
            $table->text('explanation');
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
        Schema::dropIfExists('question');
    }
}
