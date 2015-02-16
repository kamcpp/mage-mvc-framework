<?php
namespace ORM;

abstract class BaseEntity {
    protected $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        if(isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
        }
        $this->id = $id;
    }
}
