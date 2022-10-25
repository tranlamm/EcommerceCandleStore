<?php

namespace Database\Factories\products;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products\EssentialOilProduct>
 */
class EssentialOilProductFactory extends Factory
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
            'nhaCungCap' => fake()->numberBetween($min = 1, $max = 50),
            'theTich' => fake()->numberBetween($min = 1, $max = 100),
            'moTa' => fake()->text($maxNbChars = 100),
            'giaNhap' => fake()->randomNumber($nbDigits = 8, $strict = true),
            'giaBan' => fake()->randomNumber($nbDigits = 8, $strict = true)
        ];
    }
}
