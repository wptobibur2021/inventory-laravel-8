<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('root')->nullable();
            $table->string('product_code')->nullable();
            $table->string('buying_price')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('buying_date')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('image')->nullable();
            $table->string('product_quantity')->nullable();
            $table->integer('status')->nullable();
            $table->integer('return')->nullable();
            $table->integer('damage')->nullable();
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
        Schema::dropIfExists('products');
    }
}
