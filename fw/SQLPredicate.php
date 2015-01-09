<?php

class SQLPredicate extends Predicate {
	private $whereClause;

	public function __construct($whereClause) {
		$this->whereClause = $whereClause;
	}

	public function getWhereClause() {
		return $this->whereClause;
	}

	public function setWhereClause($whereClause) {
		$this->whereClause = $whereClause;
	}
}