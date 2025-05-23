<?php
class Database {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>