<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJavaVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('java_versions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('java_vendor_id')->unsigned();
			$table->foreign('java_vendor_id')->references('id')->on('java_vendors')->onDelete('cascade');
			// FIXME: must be unique per vendor ID
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
		Schema::drop('java_versions');
	}

}
