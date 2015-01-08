<?php

require_once("fw/BaseController.php");

 class AddNewsController extends  BaseController {

     public function get(Request $request) {
         return new ModelAndView("add-news", array());
     }

     public function post(Request $request) {
         /* if (...) {
            return new ModelAndView("add-news", array("errorMessages" => array(...)));
         } else {
             // insert into
             return new RedirectResponse("News");
         } */
     }
 }