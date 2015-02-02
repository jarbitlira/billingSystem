<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddQuantityAndMeasureIdToProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('products', function (Blueprint $table) {
            $table->integer("quantity")->after("brand")->unsigned();
            $table->integer("measure_id")->after("brand");
            $table->float("measure_size")->after("brand")->unsigned();
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
            $table->dropColumn("quantity");
            $table->dropColumn("measure_id");
            $table->dropColumn("measure_size");
        });
    }

}
