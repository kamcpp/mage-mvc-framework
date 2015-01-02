<?php

require_once("DatabaseConnection.php");

class MySQLDatabaseConnection extends DatabaseConnection {
	private $connection;

	public function open($host, $port, $dbname, $username, $password) {
		$this->connection = mysqli_connect("$host:$port", $username, $password, $dbname);
		if (!$this->connection) {
			// TODO Use appropriate Exception class.
			throw new Exception("Connection failed.");
		}
	}

	public function close() {
		mysqli_close($this->connection);
	}

    public function execute($sqlQuery) {
		mysqli_query($this->connection, $sqlQuery);		
	}

	public function executeWithResult($sqlQuery) {
		$result = execute($sqlQuery);
		$counter = 0;
		$toReturn = array();
		while ($row = mysqli_fetch_array($result)) {
			$toReturn[$counter++] = $row;
		}
		return $toReturn;
	}

}