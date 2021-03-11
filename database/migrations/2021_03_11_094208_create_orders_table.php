<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('wilaya');
            $table->string('province');
            $table->string('address');
            $table->double('cashback_sum',14,2)->default(0);
            $table->double('sub_total',14,2)->default(0);
            $table->double('total',14,2)->default(0);
            $table->enum('state',['pending','processing','canceled','validated'])->default('pending');
            $table->double('shipping');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('orders', static function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
        });
    }
}
