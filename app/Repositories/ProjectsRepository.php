<?php namespace CJAN\Repositories;

interface ProjectsRepository {

	public function findProjectsByLetter($letter);

	public function findById($id);

}
