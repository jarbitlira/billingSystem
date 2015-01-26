<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockToProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			//
			$table->integer('max_stock')->after('available')->nullable();
			$table->integer('min_stock')->after('max_stock')->nullable();
			$table->integer('current_stock')->after('min_stock')->nullable();
			$table->string('brand', 100)->after('weight')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function(Blueprint $table)
		{
			//
			$table->dropColumn(['max_stock', 'min_stock', 'current_stock', 'brand']);
		});
	}

}
