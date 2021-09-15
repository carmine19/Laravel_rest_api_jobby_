<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\User;
use Faker\Generator as Faker;

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

                $new_author = new Author();
                $new_author->author_name = $faker->firstName();
                $new_author->user_id = $user->id;
                $new_author->activity_description = $faker->text();

                $new_author->save();

            };

    }
}
