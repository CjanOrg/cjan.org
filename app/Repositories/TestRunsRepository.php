<?php namespace CJAN\Repositories;

interface TestRunsRepository {

	public function findByVersionId($versionId);

	public function findById($id, $direction);

}
