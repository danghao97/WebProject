<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    public function save($solution, $explanation) {
        $answer = new \App\Answer();
        $answer->save();
    }
}
