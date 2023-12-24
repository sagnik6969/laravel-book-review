<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Book::factory(33)
            ->create()
            ->each(function ($book) {

                $numberOfReviews = rand(5, 30);
                \App\Models\Review::factory()
                    ->count($numberOfReviews)
                    ->good()
                    ->for($book) // For keyword is for 1 to many relationship
                    ->create();

            });

        \App\Models\Book::factory(33)
            ->create()
            ->each(function ($book) {

                $numberOfReviews = rand(5, 30);
                \App\Models\Review::factory()
                    ->count($numberOfReviews)
                    ->average()
                    ->for($book)
                    ->create();

            });
        \App\Models\Book::factory(34)
            ->create()
            ->each(function ($book) {

                $numberOfReviews = rand(5, 30);
                \App\Models\Review::factory()
                    ->count($numberOfReviews)
                    ->bad()
                    ->for($book)
                    ->create();

            });
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
