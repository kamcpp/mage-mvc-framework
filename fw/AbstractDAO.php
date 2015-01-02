<?php

require_once("Predicate.php");
require_once("BaseEntity.php");
require_once("MySQLDatabaseConnection.php");

abstract class AbstractDAO {
	private $databaseConnection;

	public function __construct() {
		$this->databaseConnection = new MySQLDatabaseConnection();
	}

	public function insert(BaseEntity $entity) {
		$this->openConnection();
		$this->databaseConnection->execute(createInsertQuery($entity));
		$this->closeConnetion();
	}
	public function update(BaseEntity $entity) {
		$this->openConnection();
		$this->databaseConnection->execute(createUpdateQuery($entity));
		$this->closeConnetion();
	}
	public function delete($id) {
		$this->openConnection();
		$this->databaseConnection->execute(createDeleteQuery($id));
		$this->closeConnetion();
	}
	public function getAll() {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult(createSelectQueryForAll());
		$this->closeConnetion();
		return $result;
	}
	public function getById($id) {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult(createSelectQueryForId($id));
		$this->closeConnetion();
		return $result;
	}
	public function get(Predicate $predicate) {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult(createSelectQueryForPredicate($predicate));
		$this->closeConnetion();
		return $result;
	}

	protected abstract function createInsertQuery(BaseEntity $entity);
	protected abstract function createUpdateQuery(BaseEntity $entity);
	protected abstract function createDeleteQuery($id);
	protected abstract function createSelectQueryForAll();
	protected abstract function createSelectQueryForId($id);
	protected abstract function createSelectQueryForPredicate(Predicate $predicate);

	private function openConnection() {
		$this->databaseConnection->open("10.10.103.6", "3306", "phpdb", "admin", "12345");
	}

	private function closeConnetion() {
		$this->databaseConnection->close();
	}
}