<?php

abstract class BaseEntity {
	protected $id;	

	public function getId() {
		return $id;
	}

	public function setId($id) {
		$this->id = $id;
	}
}