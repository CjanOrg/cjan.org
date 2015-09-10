<?php namespace CJAN\Repositories;

interface TestRunsRepository {

	public function findByVersionId($versionId, $statusIds);

	public function findById($id, $direction);

	public function findByUserId($userId);

}
