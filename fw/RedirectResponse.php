<?php

class RedirectResponse extends Response {
	private $url;

	public function __construct() {
		if (func_num_args() == 1) {
             $this->url = func_get_arg(0);
             $this->statusCode = 301;
         } else if (func_num_args() >= 2) {
             $this->url = func_get_arg(0);
             $this->statusCode = func_get_arg(1);
         }
	}

	public function getUrl() {
		return $this->url;
	}

	public function setUrl($url) {
		$this->url = $url;
	}
}