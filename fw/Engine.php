<?php

require_once("Dispatcher.php");
require_once("ViewResolver.php");

class Engine {
    private $dispatcher;
    private $viewResolver;

    public function __construct() {
        $this->dispatcher = new Dispatcher();
        $this->viewResolver = new ViewResolver();
    }

    public function process(Request $request) {
        $controller = $this->dispatcher->createController($request);
        if ($request->isGet()) {
            $modelAndView = $controller->get($request);
        } else if ($request->isPost()) {
            $modelAndView = $controller->post($request);
        }
        return $this->viewResolver->produceView($modelAndView);
    }
}