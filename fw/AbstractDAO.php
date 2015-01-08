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
		$this->databaseConnection->execute($this->createInsertQuery($entity));
		$this->closeConnetion();
	}
	public function update(BaseEntity $entity) {
		$this->openConnection();
		$this->databaseConnection->execute($this->createUpdateQuery($entity));
		$this->closeConnetion();
	}
	public function delete($id) {
		$this->openConnection();
		$this->databaseConnection->execute($this->createDeleteQuery($id));
		$this->closeConnetion();
	}
	public function getAll() {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult($this->createSelectQueryForAll());
		$this->closeConnetion();
		return $this->createArrayOfObjects($result);
	}
	public function getById($id) {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult($this->createSelectQueryForId($id));
		$this->closeConnetion();
		return $this->createArrayOfObjects($result);
	}
	public function get(Predicate $predicate) {
		$this->openConnection();
		$result = $this->databaseConnection->executeWithResult($this->createSelectQueryForPredicate($predicate));
		$this->closeConnetion();
		return $this->createArrayOfObjects($result);
	}

	protected abstract function createInsertQuery(BaseEntity $entity);
	protected abstract function createUpdateQuery(BaseEntity $entity);

    protected function createDeleteQuery($id) {
        return "DELETE FROM ".$this->getTableName()." WHERE id = $id";
    }

	protected function createSelectQueryForAll() {
        return "SELECT * FROM ".$this->getTableName();
    }
	protected function createSelectQueryForId($id) {
        return "SELECT * FROM ".$this->getTableName()." WHERE id = $id";
    }
	protected function createSelectQueryForPredicate(Predicate $predicate) {
        if ($predicate instanceof SQLPredicate) {
            return "SELECT * FROM ".$this->getTableName()." WHERE ".$predicate->getWhereClause();
        }
        throw new Exception("Predicate type is not supported."); // TODO
    }
	protected abstract function createArrayOfObjects($result);
    protected abstract function getTableName();

	private function openConnection() {
		$this->databaseConnection->open("10.10.103.103", "3306", "phpdb", "root", "");
	}

	private function closeConnetion() {
		$this->databaseConnection->close();
	}
}