<?php

use Illuminate\Database\Seeder;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->save(1, 2);
        // $this->save(1, 3);
        // $this->save(2, 3);
    }

    public function save($idown, $iduser) {
        $friend = new \App\Friend();
        $friend->idown = $idown;
        $friend->iduser = $iduser;
        $friend->save();
    }
}
