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
        $this->save('Beginner', 'Beginner');
        $this->save('Cao thủ', 'Cao thủ');
    }

    public function save($description, $objectname) {
        $object = new \App\MyObject();
        $object->description = $description;
        $object->objectname = $objectname;
        $object->save();
    }
}
