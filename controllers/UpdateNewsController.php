<?php

class UpdateNewsController extends BaseController{

    public function get(Request $request) {
        return new ModelAndView("update-news", array());
    }

    public function post(Request $request) {

        $newsEntity = new NewsEntity();
        $newsEntity->setText($request->getParam('text'));
        $newsEntity->setTitle($request->getParam('title'));
        $newsEntity->setIssueDate(time());

        $newsDAO = Context::createEntityManager('NewsEntity');
        $newsDAO->update($newsEntity);

        return new RedirectResponse("News");
    }
}
