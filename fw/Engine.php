<?php

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
            $response = $controller->get($request);
        } else if ($request->isPost()) {
            $response = $controller->post($request);
        }
        if (!isset($response)) {
            // TO DO Replace this section with Exception Handling
            die("ERROR: HTTP method is not supported.");
        }
        if (!($response instanceof Response)) {
            // TO DO Exception Handling
            die("ERROR: Controllers MUST return a Response object.");
        }
        if ($response instanceof ModelAndView) {
            header('HTTP/1.1 ' . $response->getStatusCode());
            return $this->viewResolver->produceView($response);
        } else if ($response instanceof RedirectResponse) {
            header('Location: ' . $response->getUrl(), true, $response->getStatusCode());
            die();
        } else if ($response instanceof RawResponse) {
            header('HTTP/1.1 ' . $response->getStatusCode());
            header('Content-Type: ' . $response->getContentType());
            return $response->getData();
        } else if ($response instanceof FakeResponse) {
            return "";
        } else {
            // TO DO Exception Handling
            die("ERROR: Response type is not supported.");
        }
    }
}