<?php

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

    public function getJalaliDate() {
        require_once("lib/jdf.php");
        return jdate('Y F j H:i:S', $this->issueDate);
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

    public static function getTable() {
        return "news";
    }

    public static function getMappings() {
        $properties = array("id", "title", "text", "issueDate");
        $primaryKeys = array(array("name" => "id", "ai" => "true", "column" => "id"));
        $columns = array("title" => "title", "text" => "text", "issueDate" => "issueDate");
        $types = array("id" => "number", "title" => "text", "text" => "text", "issueDate" => "number");
        return array("properties" => $properties, "pks" => $primaryKeys, "columns" => $columns, "types" => $types);
    }
}
