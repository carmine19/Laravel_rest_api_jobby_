<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 2; $i++) {
                $new_author = new Author();
                $new_author->author_name = $faker->firstName();
                $new_author->user_id = $user->id;
                $new_author->activity_description = $faker->text();

                $new_author->save();
            }

        };
    }
}
