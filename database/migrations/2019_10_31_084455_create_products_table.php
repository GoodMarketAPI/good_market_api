<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('supplier_id', false, true);
            $table->string('name');
            $table->bigInteger('price');
            $table->string('unit');
            $table->bigInteger('temp_price')->nullable();
            $table->string('temp_unit')->nullable();
            $table->bigInteger('promotional_price')->nullable();
            $table->string('promotional_unit')->nullable();
            $table->bigInteger('temp_promotional_price')->nullable();
            $table->string('temp_promotional_unit')->nullable();
            $table->integer('stock')->default(0);
            $table->bigInteger('fee')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
