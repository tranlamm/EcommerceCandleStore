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
        Schema::create('import_invoice_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_invoice_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('import_invoice_id')->references('id')->on('import_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('import_invoice_product');
    }
};
