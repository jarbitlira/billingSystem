<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("browser");
            $table->string("device");
            $table->string("mobile_info");
            $table->string("ip");
            $table->string("system");
            $table->integer('user_id')->unsigned();
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
        Schema::drop('auth_logs');
    }

}
