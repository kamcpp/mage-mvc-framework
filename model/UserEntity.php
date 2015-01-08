<?php

require_once("fw/BaseEntity.php");

class UserEntity extends BaseEntity {
	private $username;
	private $password;
	
	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}
}