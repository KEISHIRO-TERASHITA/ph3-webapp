<?php

use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<31; $i++){
            $day = new DateTime('now');
            $day->modify($i-15 . 'day');
            $param = [
                'hours' => rand(1,5),
                'user_id' => 1,
                'date' => $day,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),
            ];
            DB::table('studies')->insert($param);
        }
    }
}
