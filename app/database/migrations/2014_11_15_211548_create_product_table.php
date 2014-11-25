<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('sku')->nullable();
			$table->string('name')->nullable();
			$table->text('description')->nullable();
			$table->float('unit_price', 10, 0)->nullable();
			$table->boolean('available')->nullable();
			$table->text('notes')->nullable();
			$table->float('length', 10, 0)->nullable();
			$table->float('weight', 10, 0)->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('provider_id')->nullable();
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
		Schema::drop('product');
	}

}
