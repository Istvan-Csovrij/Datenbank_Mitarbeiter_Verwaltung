<?php
//Den Pfad zur Datei festlegen 
$data = __DIR__ . '/../config/db.json';

// Prüfung mit is_file
if (!is_file($data)) {
    // Wenn es keine Datei ist, stoppen hier sofort
    throw new Exception("Die Date wurde nicht gefunden" . $data);
}
// Wenn wir hier ankommen, existiert die Datei sicher!
$jsonString = file_get_contents($data);
$datenArray = json_decode($jsonString, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new Exception("Fehler " . json_last_error_msg());
}

var_dump($datenArray);





?>