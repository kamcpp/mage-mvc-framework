<?php

class Request {
    private $isGet;
    private $isPost;
    private $params;
    private $cookies;
    private $path;

    public function __construct() {
        $this->cookies = array();
        $this->params = array();
    }

    public function getCookies() {
        return $this->cookies;
    }

    public function addToCookies($array) {
        foreach ($array as $key => $value) {
            $this->cookies[$key] = $value;
        }
    }

    public function isGet() {
        return $this->isGet;
    }

    public function setGet($isGet) {
        $this->isGet = $isGet;
        $this->isPost = !$this->isGet;
    }

    public function isPost() {
        return $this->isPost;
    }

    public function setPost($isPost) {
        $this->isPost = $isPost;
        $this->isGet = !$this->isPost;
    }

    public function getParams() {
        return $this->params;
    }

    public function addToParams($array) {
        foreach ($array as $key => $value) {
            $this->params[$key] = $value;
        }
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }
}