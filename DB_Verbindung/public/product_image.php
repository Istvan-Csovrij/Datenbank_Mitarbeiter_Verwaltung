<?php
require_once __DIR__ . '/../src/database.php';

$id = $_GET['id'] ?? 0;

try {
    $pdo = Database::connect(__DIR__ . '/../config/db.json');

    // KORREKTUR: Die Spalte heißt laut Screenshot "Image"
    $stmt = $pdo->prepare("SELECT Image FROM produkte WHERE Artikel_ID = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if ($product && $product['Image']) {
        // Da du keine Spalte für den Typ hast, setzen wir "image/jpeg" als Standard.
        // Das funktioniert für die meisten Bilder (jpg, png, etc.) im Browser.
        header("Content-Type: image/jpeg");
        echo $product['Image'];
        exit;
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Kein Bild in Spalte 'Image' gefunden.";
    }

} catch (Exception $e) {
    echo "Fehler: " . $e->getMessage();
}