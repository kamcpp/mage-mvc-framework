<?php

class Context {

    private static $databaseConnection;

    public static function wire() {
        self::$databaseConnection = new MySQLDatabaseConnection();
    }

    public static function createEntityManager($entityType) {
        return new EntityManager($entityType, self::$databaseConnection); // Constructor Injection
    }
}
