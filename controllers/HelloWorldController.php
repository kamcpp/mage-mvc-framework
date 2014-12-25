<?php

class HelloWorldController extends BaseController {

    public function get(Request $request) {
        return new ModelAndView("hellow", array("text" => "HELLO WORRRRLD!!!!"));
    }
}
 