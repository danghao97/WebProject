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
            $table->string('email', 70)->unique();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('fullname', 40);
            $table->string('birthday', 20)->nullable();
            $table->string('gender', 5)->nullable();
            $table->integer('type')->length(1)->default('0');
            $table->integer('score')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users ADD avatar LONGBLOB AFTER score");
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
