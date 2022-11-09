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
        Schema::create('import_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tenDonHang');
            $table->string('noiDung')->nullable();
            $table->unsignedBigInteger('nhaCungCap');
            $table->foreign('nhaCungCap')->references('id')->on('manufacturers')->onUpdate('cascade');
            $table->string('loaiHang');
            $table->string('tenSanPham');
            $table->unsignedSmallInteger('soLuong');
            $table->unsignedBigInteger('donGia');
            $table->unsignedBigInteger('tongTien');
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
        Schema::dropIfExists('import_invoices');
    }
};
