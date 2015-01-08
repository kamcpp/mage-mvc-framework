<?php

require_once("model/NewsDAO.php");
require_once("fw/BaseController.php");

 class AddNewsController extends  BaseController {

     public function get(Request $request) {
         return new ModelAndView("add-news", array());
     }

     public function post(Request $request) {

         $newsEntity = new NewsEntity();
         $newsEntity->setText($request->getParam('text'));
         $newsEntity->setTitle($request->getParam('title'));

         $newsDAO = new NewsDAO();
         $newsDAO->insert($newsEntity);

         return new RedirectResponse("News");
     }
 }