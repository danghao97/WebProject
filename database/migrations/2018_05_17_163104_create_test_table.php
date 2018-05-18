<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->integer('ID_Test')->length(11);
            $table->integer('QuestionNumber');
            $table->primary(['ID_Test', 'Question']);
            $table->string('Question',100);
            $table->string('Answer1',100);
            $table->string('Answer2',100);
            $table->string('Answer3',100);
            $table->string('Answer4',100);
            $table->string('Answer',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test');
    }
}
