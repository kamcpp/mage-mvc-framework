<?php

class NewsController extends BaseController {

	public function get(Request $request) {
        $entityManager = new Mage\ORM\EntityManager('NewsEntity');
        return new ModelAndView('news', array("news" => $entityManager->getAll()));
    }
}