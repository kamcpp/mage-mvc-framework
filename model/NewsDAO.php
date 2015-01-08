<?php

require_once("model/NewsEntity.php");
require_once("fw/AbstractDAO.php");

class NewsDAO extends AbstractDAO {

    protected function createInsertQuery(BaseEntity $entity) {
        if ($entity instanceof NewsEntity) {
            return "INSERT INTO news (title, text, issueDate) VALUES ('$entity->getTitle()', '$entity->getText()', ".time().")";
        }
        throw new Exception("Entity is not supported.");
    }

    protected function createUpdateQuery(BaseEntity $entity) {
        // TODO: Implement createUpdateQuery() method.
    }

    protected function createArrayOfObjects($result) {
        $arrayOfObjects = array();
        foreach ($result as $index => $row) {
            $newsEntity = new NewsEntity();
            $newsEntity->setId($row['id']);
            $newsEntity->setTitle($row['title']);
            $newsEntity->setText($row['text']);
            $newsEntity->setIssueDate($row['issueDate']);
            $arrayOfObjects[$index] = $newsEntity;
        }
        return $arrayOfObjects;
    }

    protected function getTableName() {
        return "news";
    }
}