<?php

require_once("Predicate.php");

class SQLPredicate extends Predicate {
	private $whereClause;

	public function __construct($whereClause) {
		$this->whereClause = $whereClause;
	}

	public function getWhereClause() {
		return $whereClause;
	}

	public function setWhereClause($whereClause) {
		$this->whereClause = $whereClause;
	}
}