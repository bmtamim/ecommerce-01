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
            $table->foreignId('category_id')->constrained('categories');
            $table->unsignedInteger('brand_id')->nullable();
            $table->text('title');
            $table->text('slug')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('type',['simple','variable','grouped'])->default('simple');
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->boolean('is_favourite')->default(false);
            $table->boolean('ondeal')->default(false);
            $table->boolean('onsale')->default(false);
            $table->boolean('review_enable')->default(true);
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
