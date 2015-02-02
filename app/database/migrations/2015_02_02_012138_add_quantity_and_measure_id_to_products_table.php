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
            $table->integer("quantity")->after("provider_id")->unsigned();
            $table->float("measure_size")->after("provider_id")->unsigned();
            $table->integer("measure_id")->after("provider_id");
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
            $table->dropColumn("measure_id");
            $table->dropColumn("quantity");
        });
    }

}
