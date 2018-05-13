<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->save(2, 2, 1, 'Cau hoi thu nhat', 'Dap an thu nhat', 'Dap an thu 2', 'Dap an thu 3', 'Dap an thu 4', 1, 'Dap an la cau tra loi');
    }

    public function save($idtype, $idlevel, $idobject, $content, $answer1, $answer2, $answer3, $answer4, $answer, $explanation) {
        $question = new \App\Question();
        $question->idtype = $idtype;
        $question->idlevel = $idlevel;
        $question->idobject = $idobject;
        $question->content = $content;
        $question->answer1 = $answer1;
        $question->answer2 = $answer2;
        $question->answer3 = $answer3;
        $question->answer4 = $answer4;
        $question->answer = $answer;
        $question->explanation = $explanation;
        $question->save();
    }
}
