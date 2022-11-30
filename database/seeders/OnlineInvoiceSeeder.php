<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class OnlineInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('online_invoices')->insert([
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '1000000', 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '2000000', 'created_at' => Carbon::create(2022, 2, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 2, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '500000', 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '400000', 'created_at' => Carbon::create(2022, 4, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 4, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '10000000', 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '5000000', 'created_at' => Carbon::create(2022, 6, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 6, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '8000000', 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '1500000', 'created_at' => Carbon::create(2022, 8, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 8, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '8000000', 'created_at' => Carbon::create(2022, 9, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 9, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '4500000', 'created_at' => Carbon::create(2022, 10, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 10, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '6000000', 'created_at' => Carbon::create(2022, 11, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 11, 18, 0, 0, 0)],
            ['account_id' => 1, 'trangThai' => 'pending', 'tongTien' => '7000000', 'created_at' => Carbon::create(2022, 12, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 12, 18, 0, 0, 0)],
        ]);

        DB::table('online_invoice_product')->insert([
            ['online_invoice_id' => 1, 'product_id' => 1, 'soLuong' => 4, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0)],
            ['online_invoice_id' => 2, 'product_id' => 5, 'soLuong' => 8, 'created_at' => Carbon::create(2022, 2, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 2, 18, 0, 0, 0)],
            ['online_invoice_id' => 3, 'product_id' => 3, 'soLuong' => 2, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0)],
            ['online_invoice_id' => 4, 'product_id' => 16, 'soLuong' => 2, 'created_at' => Carbon::create(2022, 4, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 4, 18, 0, 0, 0)],
            ['online_invoice_id' => 5, 'product_id' => 20, 'soLuong' => 100, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0)],
            ['online_invoice_id' => 6, 'product_id' => 24, 'soLuong' => 10, 'created_at' => Carbon::create(2022, 6, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 6, 18, 0, 0, 0)],
            ['online_invoice_id' => 7, 'product_id' => 20, 'soLuong' => 80, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0)],
            ['online_invoice_id' => 8, 'product_id' => 24, 'soLuong' => 3, 'created_at' => Carbon::create(2022, 8, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 8, 18, 0, 0, 0)],
            ['online_invoice_id' => 9, 'product_id' => 20, 'soLuong' => 80, 'created_at' => Carbon::create(2022, 9, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 9, 18, 0, 0, 0)],
            ['online_invoice_id' => 10, 'product_id' => 11, 'soLuong' => 10, 'created_at' => Carbon::create(2022, 10, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 10, 18, 0, 0, 0)],
            ['online_invoice_id' => 11, 'product_id' => 23, 'soLuong' => 20, 'created_at' => Carbon::create(2022, 11, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 11, 18, 0, 0, 0)],
            ['online_invoice_id' => 12, 'product_id' => 22, 'soLuong' => 20, 'created_at' => Carbon::create(2022, 12, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 12, 18, 0, 0, 0)],
            ['online_invoice_id' => 12, 'product_id' => 10, 'soLuong' => 4, 'created_at' => Carbon::create(2022, 12, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 12, 18, 0, 0, 0)],
        ]);
    }
}
