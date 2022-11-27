<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            ['ten' => 'Yankee Candle', 'diaChi' => 'Tòa nhà W4S, 171 Nam Kỳ Khởi Nghĩa, Phường 7, Quận 3, TP.HCM, Việt Nam', 'soDienThoai' => '+84 766 544 141', 'image_path' => 'yankee_candle.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['ten' => 'Heny Garden', 'diaChi' => 'Cửa hàng: 370/24 Hòa Hảo, P.5, Q.10, TPHCM', 'soDienThoai' => '0938102922', 'image_path' => 'heny_garden.webp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['ten' => 'Candle Cup', 'diaChi' => '29/23 Đoàn Thị Điểm p1 q Phú Nhuận', 'soDienThoai' => '0365978830', 'image_path' => 'candle_cup.webp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['ten' => 'Aroma Menahem', 'diaChi' => 'Công Ty Cổ Phần Xuất Nhập Khẩu Viking - 908 Đ. Kim Giang, Thanh Quang, Thanh Trì, Hà Nội.', 'soDienThoai' => '0944252806', 'image_path' => 'menahem.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['ten' => 'Bath & Body Works', 'diaChi' => '101/31C Nguyễn Văn Đậu, Phường 5, Quận Bình Thạnh, Ho Chi Minh City, Vietnam', 'soDienThoai' => '0944252806', 'image_path' => 'bath&bodyworks.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['ten' => 'Eden Candles', 'diaChi' => 'Vĩnh Phúc Province · Hanoi · Ho Chi Minh City, Vietnam', 'soDienThoai' => '0983692382', 'image_path' => 'eden_candles.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
