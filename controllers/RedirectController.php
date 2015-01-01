<?php

class RedirectController extends BaseController {

    public function get(Request $request) {
    	// TODO Make ResponseBuilder class to use Builder Pattern.
    	$resp = new RedirectResponse("http://www.google.com");    	
        return $resp;
    }
}
 