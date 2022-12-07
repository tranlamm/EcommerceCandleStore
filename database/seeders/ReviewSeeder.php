<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_product_review')->insert([
            ['account_id' => 2, 'product_id' => 1, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 1, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 1, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 1, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 1, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 1, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 1, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 1, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 1, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 2, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 2, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 2, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 2, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 3, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 3, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 3, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 4, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 4, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 4, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 5, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 6, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 6, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 6, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 6, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 6, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 6, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 6, 'point' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 6, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 6, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 7, 'point' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 8, 'point' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 9, 'point' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        
            ['account_id' => 2, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 10, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 11, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 12, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 13, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 14, 'point' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
