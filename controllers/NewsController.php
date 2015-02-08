<?php

class NewsController extends BaseController {

	public function get(Request $request) {
        $entityManager = Context::createEntityManager('NewsEntity');
        return new ModelAndView('news', array("news" => $entityManager->getAll()));
    }
}
