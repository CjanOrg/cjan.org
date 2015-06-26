<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_results', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->table('users');
			$table->integer('project_version_id')->unsigned();
			$table->foreign('project_version_id')->references('id')->table('project_versions');
			$table->integer('status_id')->unsigned();
			$table->foreign('status_id')->references('id')->table('statuses');
			$table->string('ip_address', 50);
			$table->string('locale', 50)->nullable();
			$table->string('platform_encoding', 50)->nullable();
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
		Schema::drop('test_results');
	}

}
