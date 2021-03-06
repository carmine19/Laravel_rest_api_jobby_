<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GlobalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AuthorsTableSeeder::class,
            JobsTableSeeder::class
        ]);
    }
}
