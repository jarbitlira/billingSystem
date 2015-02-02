<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityToInvoicesProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoices_products', function(Blueprint $table)
		{
			//
			$table->integer('quantity')->after('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoices_products', function(Blueprint $table)
		{
			//
			$table->dropColumn('quantity');
		});
	}

}
