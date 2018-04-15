<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save('Văn hóa', 'Văn hóa');
        $this->save('Chính trị', 'Chính trị');
        $this->save('Kinh tế', 'Kinh tế');
        $this->save('Khoa học', 'Khoa học');
        $this->save('CNTT', 'CNTT');
    }

    public function save($typename, $explanation) {
        $type = new \App\Type();
        $type->typename = $typename;
        $type->explanation = $explanation;
        $type->save();
    }
}
