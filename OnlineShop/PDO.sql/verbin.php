<?php
// 1. Schritt: Pfad zur JSON-Datei (die wir in Aufgabe 1 erstellt haben)
$dateiPfad = "../config/db.json";

// 2. Schritt: Datei lesen (Gibt einen langen String zurück)
$jsonText = file_get_contents($dateiPfad);

// 3. Schritt: In ein PHP-Array umwandeln (das 'true' ist wichtig für das Array!)
$konfiguration = json_decode($jsonText, true);

// 4. Schritt: Zur Kontrolle ausgeben
echo "<pre>";
print_r($konfiguration);
echo "</pre>";
?>