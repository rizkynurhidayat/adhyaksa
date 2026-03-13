<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
    {
        // Kita perintahkan Factory untuk membuat 50 data produk palsu
        Product::factory()->count(50)->create();
    }
}
