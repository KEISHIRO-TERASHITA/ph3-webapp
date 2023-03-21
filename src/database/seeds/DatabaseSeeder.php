<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(StudiesTableSeeder::class);
        $this->call(Study_contentsTableSeeder::class);
        $this->call(Study_languagesTableSeeder::class);
    }
}
