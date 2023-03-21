<?php

use Illuminate\Database\Seeder;

class Study_languagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i<=31; $i++)
        {
            $array = [1,2,3,4,5,6,7,8];
            shuffle($array);
            $num = rand(1,8);
            for ($j=0; $j<$num; $j++)
            {
                $param = [
                    'study_id' => $i,
                    'language_id' => $array[$j],
                ];
                DB::table('language_study')->insert($param);
            }
        }
    }
}
