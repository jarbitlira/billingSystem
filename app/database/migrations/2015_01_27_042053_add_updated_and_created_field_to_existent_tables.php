<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdatedAndCreatedFieldToExistentTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $dbName = Config::get("database.connections.mysql.database");
        $tables = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$dbName'");

        $tables = array_fetch($tables, "TABLE_NAME");
        $tables = array_except($tables, array("migrations", "password_reminders"));

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->integer("created_by")->nullable();
                $t->integer("updated_by")->nullable();
            });

            DB::table($table)->update(array("created_by" => 1, "updated_by" => 1));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $dbName = Config::get("database.connections.mysql.database");
        $tables = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$dbName'");

        $tables = array_fetch($tables, "TABLE_NAME");
        $tables = array_except($tables, array("migrations", "password_reminders"));

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn("created_by");
                $t->dropColumn("updated_by");
            });
        }
    }

}
