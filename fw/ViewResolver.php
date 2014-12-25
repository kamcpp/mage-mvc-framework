<?php

 class ViewResolver {

     public function produceView(ModelAndView $modelAndView) {
         $templateFilePath = "views/".$modelAndView->getViewName().".tpl";

         require_once("lib/smarty/Smarty.class.php");

         $smarty = new Smarty();
         $smarty->assign($modelAndView->getModel());
         return $smarty->fetch($templateFilePath);
     }
 }