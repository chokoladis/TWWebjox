<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // [
            //     'name' => 'guest',
            //     'allows' => json_encode(['post' => ['post.index']]),
            // ],
            [
                'name' => 'admin',
                'allows' => json_encode([])
            ],
            ['name' => 'editor', 'allows' => json_encode([])]
        ];
    }
}
