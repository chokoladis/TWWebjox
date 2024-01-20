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
        // \App\Models\Right::factory()->create([
        //     'name' => 'guest',
        //     'allows' => json_encode(['post' => ['post.index']]),
        // ]);

        // \App\Models\Right::factory()->create([
        //     ['name' => 'admin'],
        //     ['name' => 'editor',]
        // ]);
        
        \App\Models\Category::factory()->create([
            ['name' => 'cat'],
            ['name' => 'dog']
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
