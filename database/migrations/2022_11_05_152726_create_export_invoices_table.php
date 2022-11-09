<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tenDonHang');
            $table->string('noiDung')->nullable();
            $table->string('hinhThuc');
            $table->string('username')->nullable();
            $table->string('tenKhachHang');
            $table->string('soDienThoai');
            $table->string('diaChi');
            $table->string('loaiHang');
            $table->string('tenSanPham');
            $table->unsignedSmallInteger('soLuong');
            $table->unsignedBigInteger('donGia');
            $table->unsignedBigInteger('tongTien');
            $table->string('trangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_invoices');
    }
};
