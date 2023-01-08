<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            ['username' => 'user', 'password' => bcrypt('testuser'), 'role' => 2, 'fullname' => 'User', 'address' => 'Số 1 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'user@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'trungvt2002', 'password' => bcrypt('trungvt2002'), 'role' => 2, 'fullname' => 'Vũ Thành Trung', 'address' => 'Số 2 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2020@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'ngonamkhanh123', 'password' => bcrypt('ngonamkhanh123'), 'role' => 2, 'fullname' => 'Ngô Nam Khánh', 'address' => 'Số 3 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2021@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'phamcuong003', 'password' => bcrypt('phamcuong003'), 'role' => 2, 'fullname' => 'Phạm Mạnh Cường', 'address' => 'Số 4 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2022@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'phammanhcuong001', 'password' => bcrypt('phammanhcuong001'), 'role' => 2, 'fullname' => 'Phạm Vũ Cường', 'address' => 'Số 5 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2023@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'ngobaophuc1', 'password' => bcrypt('ngobaophuc1'), 'role' => 2, 'fullname' => 'Ngô Bảo Phúc', 'address' => 'Số 6 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2024@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'duongminhquang2002', 'password' => bcrypt('duongminhquang2002'), 'role' => 2, 'fullname' => 'Dương Minh Quang', 'address' => 'Số 7 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2025@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'quang.dminh2', 'password' => bcrypt('quang.dminh2'), 'role' => 2, 'fullname' => 'Dương Hồng Quang', 'address' => 'Số 8 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2026@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'thanh.nb2002', 'password' => bcrypt('thanh.nb2002'), 'role' => 2, 'fullname' => 'Nguyễn Bá Thanh', 'address' => 'Số 9 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2027@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
            ['username' => 'nguyenbathanh001', 'password' => bcrypt('nguyenbathanh001'), 'role' => 2, 'fullname' => 'Nguyễn Bảo Thanh', 'address' => 'Số 10 Đại Cồ Việt', 'phoneNumber' => '0912345678', 'email' => 'trungvt2028@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'isVerified' => true],
        ]);
    }
}
