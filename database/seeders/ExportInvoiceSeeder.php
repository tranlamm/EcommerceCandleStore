<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class ExportInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('export_invoices')->insert([
            ['tenDonHang' => 'Anh Trung mua trực tiếp tại cửa hàng ngày 7/12/2022', 'noiDung' => 'Bộ nến thơm + tinh dầu tinh khiết', 'tenKhachHang' => 'Vũ Mạnh Trung', 'soDienThoai' => '0312345678', 'diaChi' => 'Số 3 Đại Cồ Việt', 'tongTien' => 1550000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' => Carbon::create(2022, 1, 18, 0, 0, 0)],
        ]);

        DB::table('export_invoice_product')->insert([
            ['export_invoice_id' => 1, 'product_id' => 19, 'soLuong' => 1, 'donGia' => 550000, 'tongTien' => 550000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['export_invoice_id' => 1, 'product_id' => 10, 'soLuong' => 2, 'donGia' => 500000, 'tongTien' => 1000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
        ]);
    }
}
