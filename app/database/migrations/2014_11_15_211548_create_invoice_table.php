<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ref')->nullable();
			$table->integer('client_id')->nullable();
			$table->integer('type')->nullable();
			$table->integer('payment_type')->nullable();
			$table->integer('state')->nullable();
			$table->text('notes')->nullable();
			$table->float('subtotal', 10, 0)->nullable();
			$table->float('disccount', 10, 0)->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice');
	}

}
