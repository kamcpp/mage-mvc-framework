<?php

require_once("Authenticator.php");
require_once("AuthenticationFailedException.php");

class SimpleAuthenticator extends Authenticator {

	public function authenticate($username, $password) {
		if (strtoupper($username) != "ADMIN" || $password != "12345") {
			throw new AuthenticationFailedException();
		}
	}
}