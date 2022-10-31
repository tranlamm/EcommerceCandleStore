<?php

namespace Database\Factories\products;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products\CandleProduct>
 */
class CandleProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tenSanPham' => fake()->name(),
            'muiHuong' => fake()->word(),
            'mauSac' => fake()->word(),
            'soBac' => fake()->randomElement([1,3]),
            'nhaCungCap' => fake()->numberBetween($min = 1, $max = 10),
            'trongLuong' => fake()->numberBetween($min = 1, $max = 100) * 10,
            'moTa' => fake()->text($maxNbChars = 100),
            'giaNhap' => fake()->numberBetween($min = 1, $max = 10000) * 1000,
            'giaBan' => fake()->numberBetween($min = 1, $max = 10000) * 1000,
            'image_path' => "productDefault.png"
        ];
    }
}
