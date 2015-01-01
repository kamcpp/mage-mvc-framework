<?php

require_once("Response.php");

class RawResponse extends Response {
	private $contentType;
	private $data;

	public function __construct() {
		if (func_num_args() == 1) {
             $this->data = func_get_arg(0);
             $this->contentType = "text/plain";
         } else if (func_num_args() >= 2) {
             $this->data = func_get_arg(0);
             $this->contentType = func_get_arg(1);
         }
         $this->statusCode = 200;
	}

	public function getContentType() {
		return $this->contentType;
	}

	public function setContentType($contentType) {
		$this->contentType = $contentType;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
	}
}