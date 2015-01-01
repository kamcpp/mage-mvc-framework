<?php

class RawController extends BaseController {

    public function get(Request $request) {
    	// TODO Make ResponseBuilder class to use Builder Pattern.
    	$resp = new RawResponse("<h1>Hello World!!!</h1>", "application/vnd.ms-excel");
    	$resp->setStatusCode(401);
        return $resp;
    }
}
 