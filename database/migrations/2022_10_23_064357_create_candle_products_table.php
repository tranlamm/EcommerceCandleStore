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
        Schema::create('candle_products', function (Blueprint $table) {
            $table->id();
            $table->string('tenSanPham')->unique();
            $table->string('muiHuong');
            $table->string('mauSac');
            $table->unsignedTinyInteger('soBac');
            $table->unsignedBigInteger('nhaCungCap');
            $table->foreign('nhaCungCap')->references('id')->on('manufacturers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedSmallInteger('trongLuong');
            $table->string('moTa')->nullable();
            $table->unsignedBigInteger('giaNhap');
            $table->unsignedBigInteger('giaBan');
            $table->unsignedInteger('daBan')->default(0);
            $table->unsignedInteger('conLai')->default(0);
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
        Schema::dropIfExists('candle_products');
    }
};
