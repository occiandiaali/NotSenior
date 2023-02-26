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
        // \App\Models\User::factory(10)->create();
       // \App\Models\Tag::factory(10)->create();
      // \App\Models\Listing::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tags = \App\Models\Tag::factory(10)->create();
        \App\Models\User::factory(20)->create()->each(function($user) use($tags) {
            \App\Models\Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function($listing) use($tags) {
                $listing->tags()->attach($tags->random(2));
            });
        });
    }
}
