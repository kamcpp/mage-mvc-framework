<?php

class LoginController extends BaseController {

	private $authenticator;

	public function __construct() {
		$this->authenticator = new DatabaseAuthenticator();
	}

	public function get(Request $request) {
		return new ModelAndView('login', array());
	}

	public function post(Request $request) {		
		try {
			$this->authenticator->authenticate($request->getParam("username"), $request->getParam("password"));
			$this->setSession("logged-in", true);
			return new RedirectResponse('Home');
		} catch(AuthenticationFailedException $e) {
			return new ModelAndView('login', array('errorMessage' => 'Username or password is incorrect!'));
		}
	}
}