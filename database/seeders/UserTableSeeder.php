<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            $new_user = new User();
            $new_user->name = $faker->firstName(null);
            $new_user->password = strval($faker->randomNumber(8, true));
            $new_user->email = $faker->email();
            $checkEmail = User::where('email', $new_user->email)->first();
            while ($checkEmail) {
                $new_user->email = $faker->email();
                $checkEmail = User::where('email', $new_user->email)->first();
            }
            $new_user->save();

    }
}
