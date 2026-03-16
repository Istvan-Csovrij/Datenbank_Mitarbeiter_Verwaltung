<?php

final class Database{

public static function connect(string $jsonPath): PDO{

    // Prüfung mit is_file
if (!is_file($jsonPath)) {
    // Wenn es keine Datei ist, stoppen hier sofort
    throw new RuntimeException("Die Date wurde nicht gefunden" . $jsonPath);
}
$jsonString = file_get_contents($jsonPath);
$datenArray = json_decode($jsonString, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException("Fehler " . json_last_error_msg());
}
$host = $datenArray['host']       ?? '';
$dbname = $datenArray['dbname']   ?? '';
$user = $datenArray['user']       ?? '';
$pass = $datenArray['pass']       ?? '';
$charset = $datenArray['charset'] ?? '';

//bauen die "Anschrift" (DSN) aus Variablen 
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
// erstellen die Verbindung und geben ZURÜCK (return)
try {
    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Fehler zeigen
        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC,//Daten als Liste holen
        PDO::ATTR_EMULATE_PREPARES => false
            ]);
           }  catch(PDOException $e){
                // Falls das Passwort falsch ist oder der Server aus ist
                throw new RuntimeException("Datenbankfehler" . $e->getMessage());
           
} 
    
}
}

?>