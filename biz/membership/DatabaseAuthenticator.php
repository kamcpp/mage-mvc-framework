<?php

class DatabaseAuthenticator extends Authenticator {
	private $dao;

	public function __construct() {
		$this->dao = new EntityManager('UserEntity');
	}

	public function authenticate($username, $password) {
		$predicate = new SQLPredicate("username = '$username' AND password = '$password'");
		$users = $this->dao->get($predicate);
		if (count($users) == 0) {
			throw new AuthenticationFailedException();
		}
	}
}