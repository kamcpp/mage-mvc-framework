<?php

require_once("UserEntity.php");
require_once("fw/AbstractDAO.php");
require_once("fw/SQLPredicate.php");

class UserDAO extends AbstractDAO {

	protected function createInsertQuery(BaseEntity $userEntity) {
		return "INSERT INTO user (username, password) VALUES ('".$userEntity->getUsername()."', '".$userEntity->getPassword()."')";
	}

	protected function createUpdateQuery(BaseEntity $userEntity) {
		// TODO
	}

	protected function createArrayOfObjects($result) {		
		$arrayOfObjects = array();
		foreach ($result as $index => $row) {
			$userEntity = new UserEntity();
			$userEntity->setId($row['id']);
			$userEntity->setUsername($row['username']);
			$userEntity->setPassword($row['password']);
			$arrayOfObjects[$index] = $userEntity;
		}
		return $arrayOfObjects;
	}

    protected function getTableName() {
        return "user";
    }
}