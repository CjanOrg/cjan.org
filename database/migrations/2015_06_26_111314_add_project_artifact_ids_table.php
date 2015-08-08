<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectArtifactIdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_artifact_ids', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_group_id_id')->unsigned();
			$table->foreign('project_group_id_id')->references('id')->on('project_group_ids')->onDelete('cascade');
			$table->string('name', 255)->index('project_artifact_ids_name_index');
			$table->char('letter', 1);
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
		Schema::drop('project_artifact_ids');
	}

}
