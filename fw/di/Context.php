<?php

class Context {

    private static $databaseConnection;

    public static function wire() {
        self::$databaseConnection = new \Mage\ORM\MySQLDatabaseConnection();
    }

    public static function createEntityManager($entityType) {
        return new \Mage\ORM\EntityManager($entityType, self::$databaseConnection); // Constructor Injection
    }
}
 