<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('ship_countries')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('ship_divisions')->onDelete('cascade');
            $table->string('district_name');
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
        Schema::dropIfExists('ship_districts');
    }
}
