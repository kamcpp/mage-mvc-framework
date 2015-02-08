<?php

abstract class BaseController {

    public abstract function get(Request $request);

    public function post(Request $request) {
        return $this->get($request);
    }

    protected function getSession($key) {
        return $_SESSION[$key];
    }

    protected function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    protected function destroySession() {
        session_destroy();
    }

    protected function unsetSession($key) {
        unset($_SESSION[$key]);
    }

    protected function sessionExists($key) {
        return isset($_SESSION[$key]);
    }
    protected function addCookie($name, $value) {
        setcookie($name, $value);
    }
}
