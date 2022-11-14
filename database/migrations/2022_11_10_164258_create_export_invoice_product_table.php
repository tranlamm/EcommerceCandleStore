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
        Schema::create('export_invoice_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('export_invoice_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('export_invoice_id')->references('id')->on('export_invoices')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->unsignedInteger('soLuong');
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
        Schema::dropIfExists('export_invoice_product');
    }
};
