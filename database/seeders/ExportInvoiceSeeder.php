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

        $data = [
            [
                [10, 10, 30],
                [40, 20, 20],
                [30, 15, 40],
                [20, 5, 10]
            ],
            [
                [5, 10, 15],
                [20, 10, 30],
                [15, 20, 25],
                [10, 10, 30]
            ],
            [
                [5, 10, 20],
                [10, 20, 40],
                [20, 10, 20],
                [5, 10, 20]
            ],
            [
                [3, 50, 20],
                [4, 30, 40],
                [2, 20, 30],
                [1, 50, 10]
            ],
            [
                [50, 50, 10],
                [50, 20, 10],
                [30, 10, 20],
                [70, 20, 10]
            ],
            [
                [30, 20, 10],
                [30, 25, 15],
                [35, 4, 15],
                [5, 1, 10]
            ],
            [
                [10, 20, 30],
                [30, 10, 20],
                [15, 5, 10],
                [5, 5, 10]
            ],
            [
                [4, 10, 25],
                [6, 17, 3],
                [12, 3, 1],
                [18, 30, 1]
            ],
            [
                [17, 18, 9],
                [13, 22, 1],
                [20, 50, 5],
                [20, 10, 5]
            ],
            [
                [3, 74, 12],
                [9, 26, 18],
                [8, 30, 40],
                [10, 20, 10]
            ],
            [
                [10, 20, 4],
                [30, 40, 1],
                [40, 20, 3],
                [20, 20, 2]
            ],
            [
                [50, 20, 90],
                [50, 60, 120],
                [40, 10, 50],
                [10, 10, 30]
            ]
        ];

        for($i = 1; $i <= 12; ++$i)
        {
            DB::table('export_invoices')->insert([
                ['tenDonHang' => 'Xuất khẩu ngoại quốc', 'noiDung' => 'Accommodate', 'tenKhachHang' => 'Black Adam', 'soDienThoai' => '0123456789', 'diaChi' => 'Asgard', 'tongTien' => array_sum($data[$i - 1][0]) * 100000, 'created_at' => Carbon::create(2022, $i, 5, 0, 0, 0), 'updated_at' => Carbon::create(2022, $i, 5, 0, 0, 0)],
                ['tenDonHang' => 'Xuất khẩu ngoại quốc', 'noiDung' => 'Accommodate', 'tenKhachHang' => 'Black Adam', 'soDienThoai' => '0123456789', 'diaChi' => 'Asgard', 'tongTien' => array_sum($data[$i - 1][1]) * 100000, 'created_at' => Carbon::create(2022, $i, 9, 0, 0, 0), 'updated_at' => Carbon::create(2022, $i, 9, 0, 0, 0)],
                ['tenDonHang' => 'Xuất khẩu ngoại quốc', 'noiDung' => 'Accommodate', 'tenKhachHang' => 'Black Adam', 'soDienThoai' => '0123456789', 'diaChi' => 'Asgard', 'tongTien' => array_sum($data[$i - 1][2]) * 100000, 'created_at' => Carbon::create(2022, $i, 17, 0, 0, 0), 'updated_at' => Carbon::create(2022, $i, 17, 0, 0, 0)],
                ['tenDonHang' => 'Xuất khẩu ngoại quốc', 'noiDung' => 'Accommodate', 'tenKhachHang' => 'Black Adam', 'soDienThoai' => '0123456789', 'diaChi' => 'Asgard', 'tongTien' => array_sum($data[$i - 1][3]) * 100000, 'created_at' => Carbon::create(2022, $i, 24, 0, 0, 0), 'updated_at' => Carbon::create(2022, $i, 24, 0, 0, 0)],
            ]);
        }

        $count = 2;
        for ($i = 1; $i <= 12; ++$i)
        {
            $week = [5, 9, 17, 24];
            for ($k = 0; $k < 4; $k++)
            {
                DB::table('export_invoice_product')->insert([
                    ['export_invoice_id' => $count, 'product_id' => 26, 'soLuong' => $data[$i - 1][$k][0], 'donGia' => 100000, 'tongTien' => $data[$i - 1][$k][0] * 100000, 'created_at' => Carbon::create(2022, $i, $week[$k], 0, 0, 0), 'updated_at' =>  Carbon::create(2022, $i, $week[$k], 0, 0, 0) ],
                    ['export_invoice_id' => $count, 'product_id' => 27, 'soLuong' => $data[$i - 1][$k][1], 'donGia' => 100000, 'tongTien' => $data[$i - 1][$k][1] * 100000, 'created_at' => Carbon::create(2022, $i, $week[$k], 0, 0, 0), 'updated_at' =>  Carbon::create(2022, $i, $week[$k], 0, 0, 0) ],
                    ['export_invoice_id' => $count, 'product_id' => 28, 'soLuong' => $data[$i - 1][$k][2], 'donGia' => 100000, 'tongTien' => $data[$i - 1][$k][2] * 100000, 'created_at' => Carbon::create(2022, $i, $week[$k], 0, 0, 0), 'updated_at' =>  Carbon::create(2022, $i, $week[$k], 0, 0, 0) ],
                ]);
                $count++;
            }
        }
    }
}
