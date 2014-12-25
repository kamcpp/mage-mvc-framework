<?php

 class ModelAndView {

     private $viewName;
     private $model;

     public function __construct() {
         if (func_num_args() == 1) {
             $this->viewName = func_get_arg(0);
             $this->model = array();
         } else if (func_num_args() >= 2) {
             $this->viewName = func_get_arg(0);
             $this->model = func_get_arg(1);
         }
     }

     public function getModel() {
         return $this->model;
     }

     public function setModel($model) {
         $this->model = $model;
     }

     public function getViewName() {
         return $this->viewName;
     }

     public function setViewName($viewName) {
         $this->viewName = $viewName;
     }
 }