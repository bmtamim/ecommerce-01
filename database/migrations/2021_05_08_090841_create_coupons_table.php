<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->text('note')->nullable();
            $table->enum('discount_type', ['percentage', 'fixed_cart'])->default('percentage');
            $table->float('discount_amount', 20, 2, true);
            $table->dateTime('coupon_enable')->default(Carbon::now());
            $table->dateTime('coupon_expiry');
            $table->float('minimum_spend', 30, 2, true)->nullable();
            $table->float('maximum_spend', 30, 2, true)->nullable();
            $table->boolean('individual_use')->default(false);
            $table->boolean('exclude_sale')->default(false);
            $table->text('product_ids')->nullable();
            $table->text('exclude_product_ids')->nullable();
            $table->text('product_categories')->nullable();
            $table->text('exclude_product_categories')->nullable();
            $table->text('customer_email')->nullable();
            $table->unsignedBigInteger('usage_limit')->nullable();
            $table->unsignedBigInteger('usage_limit_per_user')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
