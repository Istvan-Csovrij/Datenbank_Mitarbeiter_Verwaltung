<?php

final class Database
{
    private static ?PDO $pdo = null;
    public static function connect(string $jsonPath = __DIR__ . "/../config.php"): PDO
    {
        // 1. Wenn wir schon eine Verbindung haben, geben wir sie einfach zurück
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        if (!is_file($jsonPath)) {
            throw new RuntimeException("Konfigurationsdatein fehlt: $jsonPath");
        }
        $datatest = json_decode(file_get_contents($jsonPath), true);
        $dsn = "mysql:host=" . ($datatest['host'] ?? '') . ";dbname=" . ($datatest['dbname'] ?? '') . ";charset=utf8mb4";

        try {
            self::$pdo = new PDO(
                $dsn,
                $datatest['user'] ?? '',
                $datatest['pass'] ?? '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            return self::$pdo;
        } catch (PDOException $e) {
            throw new RuntimeException("DB-Verbindung fehlgeschlagen: " . $e->getMessage());
        }




    }
}
?>