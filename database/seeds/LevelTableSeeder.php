<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save('Very Easy', 1);
        $this->save('Easy', 2);
        $this->save('Normal', 4);
        $this->save('Hard', 8);
        $this->save('Very Hard', 16);
    }

    public function save($levelname, $diem) {
        $level = new \App\Level();
        $level->levelname = $levelname;
        $level->diem = $diem;
        $level->save();
    }
}
