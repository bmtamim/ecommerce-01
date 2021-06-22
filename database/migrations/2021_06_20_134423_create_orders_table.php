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
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->unsignedBigInteger('num_items_sold')->nullable();
            $table->unsignedFloat('total_sale')->nullable();
            $table->unsignedFloat('tax_total')->nullable();
            $table->unsignedFloat('shipping_total')->nullable();
            $table->unsignedFloat('net_total')->nullable();
            $table->tinyInteger('returning_customer')->default(0);
            $table->text('order_notes')->nullable();
            $table->enum('status', ['hold', 'pending', 'processing', 'complete', 'failed'])->default('hold');
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
        Schema::dropIfExists('orders');
    }
}
