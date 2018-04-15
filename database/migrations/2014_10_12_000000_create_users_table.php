<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 70);
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('fullname', 40);
            $table->string('birthday', 20);
            $table->string('gender', 5);
            $table->integer('friendnums')->length(5)->unsigned();
            $table->string('idfriend', 10);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
