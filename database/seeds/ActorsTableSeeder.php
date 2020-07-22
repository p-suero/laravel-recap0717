<?php

use Illuminate\Database\Seeder;
use App\Actor;
use Faker\Generator as Faker;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
            $new_actor = new Actor();
            $new_actor->name = $faker->firstName();
            $new_actor->lastname = $faker->lastName;
            $new_actor->save();
        }
    }
}
