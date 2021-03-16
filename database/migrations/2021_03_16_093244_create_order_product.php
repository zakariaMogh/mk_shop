<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('size');
            $table->string('color');
            $table->integer('qte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropForeign('order_product_product_id_foreign');
            $table->foreignId('order_product_order_id_foreign');
        });
        Schema::dropIfExists('order_product');
    }
}
