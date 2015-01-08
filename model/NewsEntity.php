<?php

require_once("fw/BaseEntity.php");

class NewsEntity extends BaseEntity {
    private $title;
    private $text;
    private $issueDate;

    public function getIssueDate() {
        return $this->issueDate;
    }

    public function setIssueDate($issueDate) {
        $this->issueDate = $issueDate;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
}