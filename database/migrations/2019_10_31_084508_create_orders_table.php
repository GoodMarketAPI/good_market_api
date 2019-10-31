<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('user_id', false, true);
            $table->string('order_code')->unique();
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_address');
            $table->bigInteger('receiver_district_id', false, true);
            $table->string('receiver_latitude');
            $table->string('receiver_longitude');
            $table->bigInteger('sub_total');
            $table->bigInteger('total');
            $table->string('discount_code')->nullable();
            $table->string('voucher_code')->nullable();
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0: cancelled, 1: received, 2: shopping, 3: packing, 4: delivery, 5: complete');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_district_id')->references('code')->on('districts')->onDelete('cascade');
            $table->foreign('discount_code')->references('code')->on('discount_codes')->onDelete('cascade');
            $table->foreign('voucher_code')->references('code')->on('voucher_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
