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
            
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->text('text')->nullable();
            $table->decimal('previous_price', 5, 2)->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('weight', 5, 2)->nullable();
            $table->integer('shipping_days')->nullable();
            $table->decimal('shipping_cost', 5, 2)->nullable();
            $table->integer('category_id')->nullable();

            $table->timestamps(); // created_at ,  updated_at
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
