<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `clients` CHANGE `phone1` `phone1` VARCHAR (10) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `clients` CHANGE `phone2` `phone2` VARCHAR (10) NULL DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `clients` CHANGE `phone1` `phone1` INT (11) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `clients` CHANGE `phone2` `phone2` INT (11) NULL DEFAULT NULL;");
    }

}
