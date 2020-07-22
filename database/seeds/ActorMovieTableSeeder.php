<?php

use Illuminate\Database\Seeder;
use App\Actor;

class ActorMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10 ; $i++) {
            $actor = Actor::find($i);
            $actor->movies()->attach(rand(1,10));
        }
    }
}
