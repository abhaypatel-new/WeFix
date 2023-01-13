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
            $table->id();
            $table->integer('roleid')->nullable();
            $table->string('product_name');
            $table->string('product_description')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->string('brand')->nullable();
            $table->string('model_number')->nullable();
            $table->string('unique_code')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('featured')->nullable();
            $table->string('catalog_visibility')->nullable();
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
