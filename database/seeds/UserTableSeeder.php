<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save('email1@gmail', 'user1', 'pass1', 'fullname1');
        $this->save('email2@gmail', 'user2', 'pass2', 'fullname2');
        $this->save('email3@gmail', 'user3', 'pass3', 'fullname3');
    }

    public function save($email, $username, $password, $fullname) {
        $user = new \App\User();
        $user->fullname = $fullname;
        $user->email = $email;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->birthday = '';
        $user->gender = 'Nam';
        $user->friendnums = '0';
        $user->save();
    }
}
