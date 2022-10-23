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
            'mauSac' => fake()->numerify('##########'),
            'soBac' => fake()->randomElement([1,3]),
            'nhaCungCap' => fake()->numberBetween($min = 1, $max = 50),
            'trongLuong' => fake()->numberBetween($min = 10, $max = 1000),
            'moTa' => fake()->text($maxNbChars = 100),
            'giaNhap' => fake()->randomNumber($nbDigits = 8, $strict = true),
            'giaBan' => fake()->randomNumber($nbDigits = 8, $strict = true)
        ];
    }
}
