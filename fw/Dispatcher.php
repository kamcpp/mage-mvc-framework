<?php

class Dispatcher {

    public function createController(Request $request) {
        require_once("controllers/".$request->getPath()."Controller.php");
        $tokens = explode("/", $request->getPath());
        $className = $tokens[count($tokens) - 1]."Controller";
        return new $className();
    }
}

 