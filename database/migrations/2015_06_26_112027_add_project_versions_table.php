<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_versions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_artifact_id_id')->unsigned();
			$table->foreign('project_artifact_id_id')->references('id')->table('project_artifact_ids')->onDelete('cascade');;
			$table->string('name', 255)->index('project_versions_name_index');
			$table->boolean('snapshot')->default(FALSE);
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
		Schema::drop('project_versions');
	}

}
