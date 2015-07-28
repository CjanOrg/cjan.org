<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->integer('status_id')->unsigned();
			$table->foreign('status_id')->references('id')->table('statuses')->onDelete('cascade');
			$table->integer('test_run_id')->unsigned();
			$table->foreign('test_run_id')->references('id')->table('test_runs')->onDelete('cascade');
			$table->text('metadata')->nullable();
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
		Schema::drop('tests');
	}

}
