<?php

abstract class DatabaseConnection {

	public abstract function open($host, $port, $dbname, $username, $password);
	public abstract function close();
	public abstract function execute($sqlQuery);
	public abstract function executeWithResult($sqlQuery);
}