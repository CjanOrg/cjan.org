<?php namespace CJAN\Gateways;

use CJAN\Repositories\UserRepository;

class UsersGateway {

	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function findByUsername($username)
	{
		return $this->userRepository->findByUsername($username);
	}

}