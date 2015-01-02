<?php

require_once("Authenticator.php");
require_once("model/UserDAO.php");
require_once("AuthenticationFailedException.php");

class DatabaseAuthenticator extends Authenticator {
	private $dao;

	public function __construct() {
		$this->dao = new UserDAO();
	}

	public function authenticate($username, $password) {
		$predicate = new SQLPredicate("username = '$username' AND password = '$password'");
		$users = $this->dao->get($predicate);
		if (count($users) == 0) {
			throw new AuthenticationFailedException();
		}
	}
}