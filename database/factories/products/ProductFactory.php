<?php

namespace Database\Factories\products;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'loaiSanPham' => fake()->randomElement($array = array ('single wick candle', '3 wick candle', 'essential oil', 'scented wax')),
            'tenSanPham' => fake()->name(),
            'muiHuong' => fake()->word(),
            'loaiMuiHuong' => fake()->numberBetween($min = 1, $max = 5),
            'nhaCungCap' => fake()->numberBetween($min = 1, $max = 10),
            'trongLuong' => fake()->numberBetween($min = 1, $max = 100) * 10,
            'moTa' => fake()->text($maxNbChars = 200),
            'giaNhap' => fake()->numberBetween($min = 1, $max = 10000) * 1000,
            'giaBan' => fake()->numberBetween($min = 1, $max = 10000) * 1000,
            'image_path' => fake()->randomElement($array = array ('uidev1_product.webp','uidev2_product.jpg'
            ,'uidev3_product.webp','uidev4_product.webp', 'uidev5_product.jpg', 'uidev6_product.jpg')),
        ];
    }
}
