<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorModel>
 */
class AuthorModelFactory extends Factory
{
    protected static $idCounter = 1;

    public function definition(): array
    {
        return [
            'id' => self::$idCounter++,  // sequential IDs starting from 1
            'name' => $this->faker->name(),
            'bio' => $this->faker->paragraph(),
            'nationality' => $this->faker->country(),
        ];
    }
}
