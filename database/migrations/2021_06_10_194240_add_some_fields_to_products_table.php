<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->addColumn('boolean','is_featured')->default(false)->after('onsale');
            $table->addColumn('boolean','special_deals')->default(false)->after('onsale');
            $table->addColumn('boolean','special_offers')->default(false)->after('onsale');
            $table->renameColumn('ondeal','hot_deals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
             $table->dropColumn('is_featured');
             $table->dropColumn('special_deals');
             $table->dropColumn('special_offers');
            $table->renameColumn('hot_deals','ondeal');
        });
    }
}
