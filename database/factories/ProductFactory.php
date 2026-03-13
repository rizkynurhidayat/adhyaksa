<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  public function definition(): array
    {
        // Di sini kita mendefinisikan bentuk data dummy-nya
        return [
            'name' => fake()->words(3, true), // Menghasilkan 3 kata acak untuk nama produk
            'price' => fake()->numberBetween(10000, 100000), // Harga acak antara 10rb - 100rb
            'description' => fake()->paragraph(), // Paragraf acak untuk deskripsi
            'stock' => fake()->randomNumber(2), // Stok acak 2 digit (0-99)
        ];
    }
}
