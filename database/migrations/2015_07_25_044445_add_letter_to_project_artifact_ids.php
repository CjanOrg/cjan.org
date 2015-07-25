<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLetterToProjectArtifactIds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_artifact_ids', function(Blueprint $table)
		{
			$table->char('letter', 1)->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('project_artifact_ids', function(Blueprint $table)
		{
			$table->dropColumn('letter');
		});
	}

}
