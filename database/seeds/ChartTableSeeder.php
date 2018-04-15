<?php

use Illuminate\Database\Seeder;

class ChartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save('Friend Chart');
        $this->save('World Chart');
    }

    public function save($chartname) {
        $chart = new \App\Chart();
        $chart->chartname = $chartname;
        $chart->save();
    }
}
