<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProducts extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `products` CHANGE `unit_price` `unit_price` FLOAT(10,2) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `products` CHANGE `weight` `weight` FLOAT(10,2) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `products` CHANGE `length` `length` FLOAT(10,2) NULL DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `products` CHANGE `unit_price` `unit_price` FLOAT(10,0) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `products` CHANGE `weight` `weight` FLOAT(10,0) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `products` CHANGE `length` `length` FLOAT(10,0) NULL DEFAULT NULL;");
    }

}
