<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOsNamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('os_names', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('os_family_id')->unsigned();
			$table->foreign('os_family_id')->references('id')->table('os_families')->onDelete('cascade');
			// FIXME: must be unique per os family
			$table->string('name', 255);
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
		Schema::drop('os_names');
	}

}
