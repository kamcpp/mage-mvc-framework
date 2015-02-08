<?php

class Dispatcher extends BaseEntity{

    public function createController(Request $request){
        $path = $request->getPath();
        $path = explode("-", $path);

        if (isset($path[1])) {
            $_SESSION['id'] = $path[1];
            require_once("controllers/" . $path[0] . "Controller.php");
            $tokens = explode("/", $path[0]);
            $className = $tokens[count($tokens) - 1] . "Controller";
            $obj = new $className();
            if ($obj instanceof BaseController) {
                return $obj;
            }
            die("ERROR: Controller must inherit from BaseController.");
        }

        else {
                require_once("controllers/" . $path[0] . "Controller.php");
                $tokens = explode("/", $path[0]);
                $className = $tokens[count($tokens) - 1] . "Controller";
                $obj = new $className();
                if ($obj instanceof BaseController) {
                    return $obj;
                }
                die("ERROR: Controller must inherit from BaseController.");
        }
    }
}
