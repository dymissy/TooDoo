<?php
class DB {
    public static $instance;

    /**
     * Constructor
     */
    private function __construct() {
        $dsn = sprintf('mysql:dbname=%s;host=%s', DB_NAME, DB_HOST);
        try {
            self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD, array());
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Get the only db instance
     */
    public static function getInstance() {
        if (!self::$instance instanceof PDO) {
            try {
                new self;
            } catch (Exception $e) {
                // TODO error message
            }
        }
        return self::$instance;
    }
}
