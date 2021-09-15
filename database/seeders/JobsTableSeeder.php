<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authors = Author::all();

         foreach ($authors as $author) {
             for ($i=0; $i < 10; $i++) {
                 $new_job = new Job();
                 $new_job->title = $faker->firstName();
                 $new_job->author_id = $author->id;
                 $new_job->description = $faker->text();
                 $new_job->start_activity_date = $faker->dateTime();
                 $new_job->duration_activity = $faker->randomFloat(2, 0,4);
                 $new_job->price = $faker->randomFloat(2, 0, 4);;

                 $new_job->save();
             }

            };
    }
}



/*
 *
 * $table->id();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

            $table->string('title', 50);
            $table->text('description');
            $table->dateTimeTz('start_activity_date');
            $table->float('duration_activity', 3, 2);
            $table->decimal('price', 9, 2);


            $table->timestamps();
 */
