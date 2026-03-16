<?php
require_once __DIR__ . "db_conection.php";



// 3. DAS PASSWORT VERSCHLÜSSELN (Hashen)
// Dieser Befehl macht aus "geheim123" etwas wie "$2y$10$asdf..."
$gehastesPasswort = password_hash($password_klartext, PASSWORD_DEFAULT);

try {
    // 4. In die neue Tabelle speichern
    $sql = "INSERT INTO users (email, passwort, rolle) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    // Hier die Kommas beachten:
    $stmt->execute([$email, $gehastesPasswort, $rolle]);

    echo "Erfolg! Der Admin-Account wurde erstellt.";

} catch (PDOException $e) {
    echo "Fehler beim erstellen: " . $e->getMessage();
}

?>