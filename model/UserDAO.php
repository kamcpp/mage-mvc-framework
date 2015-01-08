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

	protected function createDeleteQuery($id) {
		return "DELETE FROM user WHERE id = $id";
	}

	protected function createSelectQueryForAll() {
		return "SELECT * FROM user";
	}

	protected function createSelectQueryForId($id) {
		return "SELECT * FROM user WHERE id = $id";
	}

	protected function createSelectQueryForPredicate(Predicate $predicate) {
		if ($predicate instanceof SQLPredicate) {
			return "SELECT * FROM user WHERE ".$predicate->getWhereClause();
		}
		throw new Exception("Predicate type is not supported."); // TODO
	}

	protected function createArrayOfObjects($result) {		
		$arrayOfObjects = array();
		foreach ($$result as $index => $row) {
			$userEntity = new UserEntity();
			$userEntity->setId($row['id']);
			$userEntity->setUsername($row['username']);
			$userEntity->setPassword($row['password']);
			$arrayOfObjects[$index] = $userEntity;
		}
		return $arrayOfObjects;
	}
}