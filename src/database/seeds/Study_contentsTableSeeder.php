<?php

use Illuminate\Database\Seeder;

class Study_contentsTableSeeder extends Seeder
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
            $array = [1,2,3,4];
            shuffle($array);
            $num = rand(1,4);
            for ($j=0; $j<$num; $j++)
            {
                $param = [
                    'study_id' => $i,
                    'content_id' => $array[$j],
                ];
                DB::table('content_study')->insert($param);
            }
        }
    }
}
