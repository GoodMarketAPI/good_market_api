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
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->bigInteger('price');
            $table->string('unit');
            $table->bigInteger('temp_price')->nullable();
            $table->string('temp_unit')->nullable();
            $table->string('temp_weight')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('note')->nullable();
            $table->date('expected_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
