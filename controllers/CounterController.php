<?php

class CounterController extends BaseController {

    public function get(Request $request) {
        $number = 0;
        if ($this->sessionExists("n")) {
            $number = $this->getSession("n");
        }
        $number++;
        $this->setSession("n", $number);
        return new ModelAndView("counter", array("number" => $number));
    }
}