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
        // $this->call(UserSeeder::class);
        factory(App\Book::class,20)->create();
        factory(App\Genre::class)->create([
            "name" => "romance"
        ]);
        factory(App\Genre::class)->create([
            "name" => "mystery"
        ]);
        factory(App\Genre::class)->create([
            "name" => "thriller"
        ]);
        factory(App\Genre::class)->create([
            "name" => "horror"
        ]);
        factory(App\Genre::class)->create([
            "name" => "fantasy"
        ]);
        factory(App\Genre::class)->create([
            "name" => "children's book"
        ]);
    }
}
