<?php

require_once("model/NewsDAO.php");

class NewsController extends BaseController {

	public function get(Request $request) {
        $newsDAO = new NewsDAO();
		return new ModelAndView('news', array("news" => $newsDAO->getAll()));
	}
}