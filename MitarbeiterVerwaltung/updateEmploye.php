<?php
session_start();
require_once __DIR__ . '/db_conection.php';

if (!isset($_SESSION['rolle']) && $_SESSION['rolle'] !== 'admin') {
    die('Stop nur mit Admin berechtigung');
}
$id = $_POST['id'] ?? null; // Das ?? null verhindert Fehler, wenn die ID fehlt
$vorname = $_POST['vorname'] ?? null;
$nachname = $_POST['nachname'] ?? null;
$abteilung = $_POST['abteilung'] ?? null;
$geburtsdatum = $_POST['geburtsdatum'] ?? null;
$strasse = $_POST['strasse'] ?? null;
$hnummer = $_POST['hnummer'] ?? null;
$wohnort = $_POST['wohnort'] ?? null;
$geburtsort = $_POST['geburtsort'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("UPDATE mitarbeiter SET vorname = ?, nachname = ?, abteilung = ?, geburtsdatum = ?, strasse = ?, hnummer = ?, wohnort = ?, geburtsort = ? WHERE id = ?");
    $stmt->execute([$vorname, $nachname, $abteilung, $geburtsdatum, $strasse, $hnummer, $wohnort, $geburtsort, $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("Keine Id übergeben wurde");
}

header("Location: admin.php?meldung=gespeichert");
exit;
?>