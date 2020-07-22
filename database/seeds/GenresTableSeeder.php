<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                "name" => "Action",
                "slug" => "action"
            ],
            [
                "name" => "Horror",
                "slug" => "horror"
            ],
            [
                "name" => "Adventure",
                "slug" => "adventure"
            ]
        ];

        foreach ($genres as $genre) {
            $new_genre = new Genre();
            $new_genre->fill($genre);
            $new_genre->save();
        }
    }
}
