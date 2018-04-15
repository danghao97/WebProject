<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AnswerTableSeeder::class,
            ChartTableSeeder::class,
            UserTableSeeder::class,
            FriendTableSeeder::class,
            LevelTableSeeder::class,
            ObjectTableSeeder::class,
            QuestionTableSeeder::class,
            TypeTableSeeder::class,
        ]);
    }
}
