<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $consolas = ['ps4', 'ps5', 'pc', 'xbox'];

        return [
            'titulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'year' => $this->faker->year,
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'imagen' => 'https://loremflickr.com/320/240?random='.rand(1, 50),
            'consola' => $this->faker->randomElement($consolas),
        ];
    }
}
