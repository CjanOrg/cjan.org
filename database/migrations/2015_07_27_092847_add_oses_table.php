<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('version', 255);
			$table->integer('os_name_id')->unsigned();
			$table->foreign('os_name_id')->references('id')->table('os_names')->onDelete('cascade');
			$table->integer('os_arch_id')->unsigned();
			$table->foreign('os_arch_id')->references('id')->table('os_archs')->onDelete('cascade');
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
		Schema::drop('oses');
	}

}
