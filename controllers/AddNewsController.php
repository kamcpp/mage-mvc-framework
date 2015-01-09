<?php

use Mage\ORM\EntityManager;

 class AddNewsController extends BaseController {

     public function get(Request $request) {
         return new ModelAndView("add-news", array());
     }

     public function post(Request $request) {

         $newsEntity = new NewsEntity();
         $newsEntity->setText($request->getParam('text'));
         $newsEntity->setTitle($request->getParam('title'));
         $newsEntity->setIssueDate(time());

         $newsDAO = new EntityManager('NewsEntity');
         $newsDAO->insert($newsEntity);

         return new RedirectResponse("News");
     }
 }