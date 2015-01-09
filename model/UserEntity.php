<?php

class UserEntity extends Mage\ORM\BaseEntity {
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

    public static function getTable() {
        return "user";
    }

    public static function getMappings() {
        $properties = array("id", "username", "password");
        $primaryKeys = array(array("name" => "id", "ai" => "true", "column" => "id"));
        $columns = array("username" => "username", "password" => "password");
        $types = array("id" => "number", "username" => "text", "password" => "text");
        return array("properties" => $properties, "pks" => $primaryKeys, "columns" => $columns, "types" => $types);
    }
}