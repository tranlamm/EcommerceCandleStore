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
        Schema::create('essential_oil_products', function (Blueprint $table) {
            $table->id();
            $table->string('tenSanPham')->unique();
            $table->string('muiHuong')->nullable();
            $table->unsignedBigInteger('nhaCungCap');
            $table->foreign('nhaCungCap')->references('id')->on('manufacturers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedSmallInteger('theTich');
            $table->string('image_path')->nullable()->default('');
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
        Schema::dropIfExists('essential_oil_products');
    }
};
