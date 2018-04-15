<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend', function (Blueprint $table) {
            $table->integer('idown')->unsigned();
            $table->foreign('idown')->references('id')->on('users')->onDelete('cascade');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['idown', 'iduser']);
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
        Schema::dropIfExists('friend');
    }
}
