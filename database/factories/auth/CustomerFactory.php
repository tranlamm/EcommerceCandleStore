<?php

namespace Database\Factories\auth;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\auth\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $username = fake()->userName();
        return [
            'username' => $username,
            'password' => bcrypt($username),
            'role' => 2,
            'hoVaTen' => fake()->name(),
            'diaChi' => fake()->address(),
            'soDienThoai' => fake()->regexify("09\\d{8}"),
            'email' => fake()->email(),
        ];
    }
}
