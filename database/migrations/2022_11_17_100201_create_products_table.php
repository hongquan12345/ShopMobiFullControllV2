<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) 
        {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade');

            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();

            $table->mediumText('small_description');
            $table->longText('description');

            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=trending and 0=not-trending');
            $table->tinyInteger('status')->default('0')->comment('1=hidden and 0=visible');

            $table->string('metal_title')->nullable();
            $table->mediumText('metal_keyword')->nullable();
            $table->mediumText('metal_description')->nullable();

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
};
