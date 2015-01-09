<?php

namespace Mage\ORM {
    class EntityManager {
        private $entityType;
        private $databaseConnection;

        public function __construct($entityType) {
            $this->entityType = $entityType;
            $this->databaseConnection = new MySQLDatabaseConnection();
        }

        public function insert(BaseEntity $entity) {
            $this->openConnection();
            $this->databaseConnection->execute($this->createInsertQuery($entity));
            $this->closeConnetion();
        }

        public function update(BaseEntity $entity) {
            $this->openConnection();
            $this->databaseConnection->execute($this->createUpdateQuery($entity));
            $this->closeConnetion();
        }

        public function delete($id) {
            $this->openConnection();
            $this->databaseConnection->execute($this->createDeleteQuery($id));
            $this->closeConnetion();
        }

        public function getAll() {
            $this->openConnection();
            $result = $this->databaseConnection->executeWithResult($this->createSelectQueryForAll());
            $this->closeConnetion();
            return $this->createArrayOfObjects($result);
        }

        public function getById($id) {
            $this->openConnection();
            $result = $this->databaseConnection->executeWithResult($this->createSelectQueryForId($id));
            $this->closeConnetion();
            return $this->createArrayOfObjects($result);
        }

        public function get(Predicate $predicate) {
            $this->openConnection();
            $result = $this->databaseConnection->executeWithResult($this->createSelectQueryForPredicate($predicate));
            $this->closeConnetion();
            return $this->createArrayOfObjects($result);
        }

        protected function createDeleteQuery($id) {
            return "DELETE FROM " . $this->getTableName() . " WHERE id = $id";
        }

        protected function createSelectQueryForAll() {
            return "SELECT * FROM " . $this->getTableName();
        }

        protected function createSelectQueryForId($id) {
            return "SELECT * FROM " . $this->getTableName() . " WHERE id = $id";
        }

        protected function createSelectQueryForPredicate(Predicate $predicate) {
            if ($predicate instanceof SQLPredicate) {
                return "SELECT * FROM " . $this->getTableName() . " WHERE " . $predicate->getWhereClause();
            }
            throw new Exception("Predicate type is not supported."); // TODO
        }

        protected function createInsertQuery(BaseEntity $entity) {
            $sqlQuery = "INSERT INTO " . $this->getTableName() . " (";
            $className = $this->entityType;
            $mapping = $className::getMappings();
            // PKs
            for ($i = 0; $i < count($mapping["pks"]); $i++) {
                if (!$mapping["pks"][$i]["ai"]) {
                    $sqlQuery .= $mapping["pks"][$i]["column"];
                    $sqlQuery .= ", ";
                }
            }
            // Ordinary columns
            for ($i = 0; $i < count($mapping["properties"]); $i++) {
                $found = false;
                for ($j = 0; $j < count($mapping["pks"]); $j++) {
                    if ($mapping["properties"][$i] == $mapping["pks"][$j]["name"]) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $sqlQuery .= $mapping["columns"][$mapping["properties"][$i]];
                    if ($i < count($mapping["properties"]) - 1) {
                        $sqlQuery .= ", ";
                    }
                }
            }
            $sqlQuery .= ") VALUES (";
            for ($i = 0; $i < count($mapping["properties"]); $i++) {
                $found = false;
                for ($j = 0; $j < count($mapping["pks"]); $j++) {
                    if ($mapping["properties"][$i] == $mapping["pks"][$j]["name"]) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $getterName = "get" . ucfirst($mapping["properties"][$i]);
                    $value = $entity->$getterName();
                    $type = $mapping["types"][$mapping["properties"][$i]];
                    if ($type == "number") {
                        $sqlQuery .= $value;
                    } else if ($type == "text") {
                        $sqlQuery .= "'" . $value . "'";
                    } else {
                        $sqlQuery .= "'" . $value . "'";
                    }
                    if ($i < count($mapping["properties"]) - 1) {
                        $sqlQuery .= ", ";
                    }
                }
            }
            $sqlQuery .= ")";
            return $sqlQuery;
        }

        protected function createUpdateQuery(BaseEntity $entity) {
            $sqlQuery = "UPDATE";
            // TODO: FINAL PROJECT
            return $sqlQuery;
        }

        protected function createArrayOfObjects($result) {
            $objects = array();
            $className = $this->entityType;
            $mapping = $className::getMappings();
            foreach ($result as $index => $row) {
                $object = new $className();
                for ($i = 0; $i < count($mapping["properties"]); $i++) {
                    $setterMethod = 'set' . ucfirst($mapping["properties"][$i]);
                    $found = false;
                    $pkIndex = -1;
                    for ($j = 0; $j < count($mapping["pks"]); $j++) {
                        if ($mapping["properties"][$i] == $mapping["pks"][$j]["name"]) {
                            $found = true;
                            $pkIndex = $j;
                        }
                    }
                    if ($found) {
                        $columnName = $mapping["pks"][$pkIndex]["column"];
                    } else {
                        $columnName = $mapping["columns"][$mapping["properties"][$i]];
                    }
                    $value = $row[$columnName];
                    $object->$setterMethod($value);
                }
                $objects[$index] = $object;
            }
            return $objects;
        }

        protected function getTableName() {
            $className = $this->entityType;
            return $className::getTable();
        }

        private function openConnection() {
            $this->databaseConnection->open("10.10.103.103", "3306", "phpdb", "root", "");
        }

        private function closeConnetion() {
            $this->databaseConnection->close();
        }
    }
}