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

//            $table->unsignedBigInteger('product_category_id');
//            $table->foreign('product_category_id')
//                ->references('id')->on('product_categories')
//                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_category_id')->constrained('product_categories')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('product_name');
            $table->double('product_price');
            $table->text('product_description')->nullable();
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
