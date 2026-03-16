<?php
session_start();
require_once __DIR__ . '/../db_conection.php';

if (!isset($_SESSION['rolle']) || $_SESSION['rolle'] !== 'admin') {
    die("Stopp! Nur Admins dürfen hier Mitarbeiter hinzufügen.");
}

try {
    // 1. Daten sicher abrufen
    $vorname = $_POST['vorname'] ?? '';
    $nachname = $_POST['nachname'] ?? '';
    $geburtsdatum = $_POST['geburtsdatum'] ?? '';
    $wohnort = $_POST['wohnort'] ?? '';
    $geburtsort = $_POST['geburtsort'] ?? '';
    $abteilung = $_POST['abteilung'] ?? '';

    // 2. Straße und Hausnummer trennen (Wichtig für deine 2 Spalten in der DB)
    $adresseRaw = $_POST['strHausnummer'] ?? '';
    $teile = explode(' ', trim($adresseRaw));
    $hnummer = (count($teile) > 1) ? array_pop($teile) : '';
    $strasse = implode(' ', $teile);

    // 3. Der SQL-Befehl (8 Spalten)
    // Achte darauf: Hier steht jetzt 'vorname' (korrigiert) und KEIN Punkt oder Komma zu viel!
    $sql = "INSERT INTO mitarbeiter 
            (vorname, nachname, geburtsdatum, strasse, hnummer, wohnort, geburtsort, abteilung) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // 4. Die Ausführung (EXAKT 8 Werte passend zu den 8 Fragezeichen)
    $stmt->execute([
        $vorname,      // 1
        $nachname,     // 2
        $geburtsdatum, // 3
        $strasse,      // 4
        $hnummer,      // 5
        $wohnort,      // 6
        $geburtsort,   // 7
        $abteilung     // 8
    ]);

    echo "<h2>Geschafft!</h2><p>Mitarbeiter $vorname wurde erfolgreich in der Datenbank verewigt.</p>";
    echo '<a href="../add.php">Weiteren Mitarbeiter hinzufügen</a>';

} catch (PDOException $e) {
    // Falls noch was hakt, zeigt uns das genau wo
    die("Datenbankfehler: " . $e->getMessage());
}
?>