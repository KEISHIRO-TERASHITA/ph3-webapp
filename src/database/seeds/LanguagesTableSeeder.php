<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = 
        [
            [
                'language' => 'HTML',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'CSS',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'JavaScript',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'PHP',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'Laravel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'SQL',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'SHELL',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'language' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];

        foreach($params as $param)
        {
            DB::table('Languages')->insert($param);
        }
    }
}
