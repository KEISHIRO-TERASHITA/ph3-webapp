<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            [
                'content' => 'N予備校',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'content' => 'ドットインストール',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'content' => 'POSSE課題',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'content' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];

        foreach($params as $param)
        {
            DB::table('contents')->insert($param);
        }
    }
}
