<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_order', function (Blueprint $table) {
            $table->foreignId('order_id')->references('id')
                ->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('color_id')->references('id')
                ->on('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->integer('qte');
            $table->primary(['order_id','color_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_order');
    }
}
