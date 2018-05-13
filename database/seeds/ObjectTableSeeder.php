<?php

use Illuminate\Database\Seeder;

class ObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save('Beginner', 'Beginner', 100);
        $this->save('Cao thủ', 'Cao thủ', 1000);
    }

    public function save($description, $objectname, $totalscore)
    {
        $object = new \App\MyObject();
        $object->description = $description;
        $object->objectname = $objectname;
        $object->totalscore = $totalscore;
        $object->save();
    }
}
