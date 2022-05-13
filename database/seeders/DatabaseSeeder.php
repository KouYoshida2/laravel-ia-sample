<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CommentSeeder::class,
            LectureSeeder::class,
            // LectureUserSeeder::class
        ]);

        // \App\Models\Product::factory(100)->create();
        \App\Models\Text::factory(100)->create();
    }
}
