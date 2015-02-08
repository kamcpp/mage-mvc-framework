<?php

 class ViewResolver {

     public function produceView(ModelAndView $modelAndView) {
         $templateFilePath = "views/".$modelAndView->getViewName().".tpl";

         $smarty = new Smarty();
         $smarty->assign($modelAndView->getModel());
         return $smarty->fetch($templateFilePath);
     }
 }
