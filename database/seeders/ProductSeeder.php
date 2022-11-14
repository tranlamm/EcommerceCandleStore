<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fragrances')->insert([
            ['theLoai' => 'Fresh'],
            ['theLoai' => 'Fruity'],
            ['theLoai' => 'Sweet'],
            ['theLoai' => 'Woody'],
            ['theLoai' => 'Floral'],
        ]);
        \App\Models\products\Product::factory(100)->create();
    }
}
