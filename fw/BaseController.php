<?php

require_once("ModelAndView.php");

class BaseController {

    public function get(Request $request) {
        // TODO
        echo "BASE CONTROLLER IS CALLED.";
    }

    public function post() {
        return get();
    }

    private function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    protected function getSession($key) {
        $this->startSession();
        return $_SESSION[$key];
    }

    protected function setSession($key, $value) {
        $this->startSession();
        $_SESSION[$key] = $value;
    }

    protected function destroySession() {
        session_destroy();
    }

    protected function unsetSession($key) {
        unset($_SESSION[$key]);
    }

    protected function addCookie($name, $value) {
        setcookie($name, $value);
    }
}
 