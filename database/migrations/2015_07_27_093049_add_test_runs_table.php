<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestRunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_runs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ip_address', 50);
			$table->string('locale', 50)->nullable();
			$table->string('timezone', 50)->nullable();
			$table->string('platform_encoding', 50)->nullable();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->table('users')->onDelete('cascade');;
			$table->integer('project_version_id')->unsigned();
			$table->foreign('project_version_id')->references('id')->table('project_versions')->onDelete('cascade');
			$table->integer('os_id')->unsigned();
			$table->foreign('os_id')->references('id')->table('oses')->onDelete('cascade');
			$table->integer('status_id')->unsigned();
			$table->foreign('status_id')->references('id')->table('statuses')->onDelete('cascade');
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
		Schema::drop('test_runs');
	}

}
