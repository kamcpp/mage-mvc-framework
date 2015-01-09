<?php

class DatabaseAuthenticator extends Authenticator {

	public function authenticate($username, $password) {
        $dao = Context::getEntityManager('UserEntity');
		$predicate = new SQLPredicate("username = '$username' AND password = '$password'");
		$users = $dao->get($predicate);
		if (count($users) == 0) {
			throw new AuthenticationFailedException();
		}
	}
}