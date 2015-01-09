<?php
namespace Mage\ORM {
    abstract class BaseEntity {
        protected $id;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
    }
}