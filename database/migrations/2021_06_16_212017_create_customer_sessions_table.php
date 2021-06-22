<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_key')->index();
            $table->longText('session_value')->nullable();
            $table->dateTime('session_expiry')->default(\Carbon\Carbon::now()->addDays(2));
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
        Schema::dropIfExists('customer_sessions');
    }
}
