<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class ImportInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('import_invoices')->insert([
            ['tenDonHang' => 'Nhập hàng đợt 1', 'noiDung' => 'Nhập kho khai trương cửa hàng sản phẩm nến 1 bấc', 'tongTien' => '100000000', 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 2', 'noiDung' => 'Nhập kho khai trương cửa hàng sản phẩm nến 3 bấc', 'tongTien' => '450000000', 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 3', 'noiDung' => 'Nhập kho khai trương cửa hàng sản phẩm tinh dầu', 'tongTien' => '110000000', 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 4', 'noiDung' => 'Nhập kho khai trương cửa hàng sản phẩm sáp thơm', 'tongTien' => '100000000', 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 5', 'noiDung' => 'Nhập kho khai trương cửa hàng', 'tongTien' => '50000000', 'created_at' => Carbon::create(2022, 2, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 2, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 6', 'noiDung' => 'Nhập kho khai trương cửa hàng', 'tongTien' => '50000000', 'created_at' => Carbon::create(2022, 4, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 4, 18, 0, 0, 0)],
            ['tenDonHang' => 'Nhập hàng đợt 7', 'noiDung' => 'Nhập kho khai trương cửa hàng', 'tongTien' => '50000000', 'created_at' => Carbon::create(2022, 6, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 6, 18, 0, 0, 0)],
        ]);

        DB::table('import_invoice_product')->insert([
            ['import_invoice_id' => 1, 'product_id' => 1, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 2, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 3, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 4, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 5, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 6, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 7, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 8, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 9, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],
            ['import_invoice_id' => 1, 'product_id' => 10, 'soLuong' => 100, 'donGia' => 100000, 'tongTien' => 10000000, 'created_at' => Carbon::create(2022, 1, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 1, 18, 0, 0, 0) ],

            ['import_invoice_id' => 2, 'product_id' => 11, 'soLuong' => 200, 'donGia' => 450000, 'tongTien' => 90000000, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0) ],
            ['import_invoice_id' => 2, 'product_id' => 12, 'soLuong' => 200, 'donGia' => 450000, 'tongTien' => 90000000, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0) ],
            ['import_invoice_id' => 2, 'product_id' => 13, 'soLuong' => 200, 'donGia' => 450000, 'tongTien' => 90000000, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0) ],
            ['import_invoice_id' => 2, 'product_id' => 14, 'soLuong' => 200, 'donGia' => 450000, 'tongTien' => 90000000, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0) ],
            ['import_invoice_id' => 2, 'product_id' => 15, 'soLuong' => 200, 'donGia' => 450000, 'tongTien' => 90000000, 'created_at' => Carbon::create(2022, 3, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 3, 18, 0, 0, 0) ],

            ['import_invoice_id' => 3, 'product_id' => 16, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0) ],
            ['import_invoice_id' => 3, 'product_id' => 17, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0) ],
            ['import_invoice_id' => 3, 'product_id' => 18, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0) ],
            ['import_invoice_id' => 3, 'product_id' => 19, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0) ],
            ['import_invoice_id' => 3, 'product_id' => 20, 'soLuong' => 300, 'donGia' => 100000, 'tongTien' => 30000000, 'created_at' => Carbon::create(2022, 5, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 5, 18, 0, 0, 0) ],

            ['import_invoice_id' => 4, 'product_id' => 21, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0) ],
            ['import_invoice_id' => 4, 'product_id' => 22, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0) ],
            ['import_invoice_id' => 4, 'product_id' => 23, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0) ],
            ['import_invoice_id' => 4, 'product_id' => 24, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0) ],
            ['import_invoice_id' => 4, 'product_id' => 25, 'soLuong' => 200, 'donGia' => 100000, 'tongTien' => 20000000, 'created_at' => Carbon::create(2022, 7, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 7, 18, 0, 0, 0) ],

            ['import_invoice_id' => 5, 'product_id' => 26, 'soLuong' => 1000, 'donGia' => 50000, 'tongTien' => 50000000, 'created_at' => Carbon::create(2022, 2, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 2, 18, 0, 0, 0) ],
            
            ['import_invoice_id' => 6, 'product_id' => 27, 'soLuong' => 1000, 'donGia' => 50000, 'tongTien' => 50000000, 'created_at' => Carbon::create(2022, 4, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 4, 18, 0, 0, 0) ],
            
            ['import_invoice_id' => 7, 'product_id' => 28, 'soLuong' => 1000, 'donGia' => 50000, 'tongTien' => 50000000, 'created_at' => Carbon::create(2022, 6, 18, 0, 0, 0), 'updated_at' =>  Carbon::create(2022, 6, 18, 0, 0, 0) ],
        ]);
    }
}
