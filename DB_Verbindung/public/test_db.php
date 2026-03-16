<?php
require_once __DIR__ . '/../src/database.php';

try {
    // 2. Verbindung aufbauen (Pfad zur JSON-Datei angeben)
    $pdo = Database::connect(__DIR__ . '/../config/db.json');

    // 3. Aufgabe 12: Minimal-Query ausführen
    // query() schickt den Befehl ab, fetch() holt das Ergebnis ab
    $stmt = $pdo->query("SELECT NOW() AS aktuelle_zeit");
    $row = $stmt->fetch();

    echo "<h1>DB-Verbindung steht!</h1>";
    echo "Datenbank-Uhrzeit: " . $row['aktuelle_zeit'];

} catch (Exception $e) {
    echo "<h1>Die Verbindung ist fehlgeschlagen</h1>";
    echo $e->getMessage();
}

?>