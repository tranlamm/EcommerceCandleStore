<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role' => 'admin'],
            ['role' => 'client']
        ]);

        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 1
        ]);
    }
}
