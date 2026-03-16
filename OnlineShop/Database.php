<?php
/**
 * Datenbank-Klasse (OnlineShop/Database.php)
 */
final class Database
{
    private static ?PDO $pdo = null;

    public static function connect(string $jsonPath = __DIR__ . "/config.json"): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        if (!is_file($jsonPath)) {
            throw new RuntimeException("Konfigurationsdatei fehlt: $jsonPath");
        }

        $dataset = json_decode(file_get_contents($jsonPath), true);
        $dsn = "mysql:host=" . ($dataset['host'] ?? '') . ";dbname=" . ($dataset['dbname'] ?? '') . ";charset=utf8mb4";

        try {
            self::$pdo = new PDO($dsn, $dataset['user'] ?? '', $dataset['pass'] ?? '', options: [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return self::$pdo;
        } catch (PDOException $e) {
            throw new RuntimeException("DB-Verbindung fehlgeschlagen: " . $e->getMessage());
        }
    }
}