<?php

class Dispatcher {

    public function createController(Request $request) {
        require_once("controllers/".$request->getPath()."Controller.php");
        $tokens = explode("/", $request->getPath());
        $className = $tokens[count($tokens) - 1]."Controller";
        $obj = new $className();
        if ($obj instanceof BaseController) {
        	return $obj;
        }
        die("ERROR: Controller must inherit from BaseController.");
    }
}

 