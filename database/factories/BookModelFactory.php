<?php

namespace Database\Factories;

use App\Models\AuthorModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookModel>
 */
class BookModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/BookFactory.php

    public function definition(): array
    {
        return [
            'author_id' => AuthorModel::factory(), // Auto create author
            'title' => fake()->sentence(3),
            'isbn' => fake()->unique()->isbn13(),
            'publication_year' => fake()->year(),
            'genre' => fake()->word(),
            'available_copies' => fake()->numberBetween(1, 10),
        ];
    }

}
