<?php

require_once("fw/BaseController.php");
require_once("biz/membership/SimpleAuthenticator.php");

class LoginController extends BaseController {

	public function get(Request $request) {
		return new ModelAndView('login', array());
	}

	public function post(Request $request) {
		$authenticator = new SimpleAuthenticator();
		try {
			$authenticator->authenticate($request->getParam("username"), $request->getParam("password"));
			$this->setSession("logged-in", true);
			return new RedirectResponse('Home');
		} catch(AuthenticationFailedException $e) {
			return new ModelAndView('login', array('errorMessage' => 'Username or password is incorrect!'));
		}
	}
}