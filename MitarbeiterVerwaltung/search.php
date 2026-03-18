<?php
session_start();
require_once __DIR__ . '/db_conection.php';
// 1. Hol den Text aus dem Formular-Input (name="search")
$suchbegrief = $_GET['search'] ?? '';


if (!empty($suchbegrief)) {
    // 2. Suche in der Datenbank (Vorname)
    // Wir nutzen % damit auch Teilnamen gefunden werden
    $stmt = $pdo->prepare("SELECT * FROM mitarbeiter Where vorname Like ? OR nachname Like ? OR abteilung Like ? OR geburtsdatum Like ?
   OR strasse Like ? or hnummer Like ? OR wohnort Like ? OR geburtsort Like ? ");
    $suche_mit_platzhalter = '%' . $suchbegrief . '%';
    $stmt->execute([$suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter, $suche_mit_platzhalter]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleDatenBank.css">
</head>

<body>
    <nav class="navclassStart">
        <div>
            <img class="datenbankImg" src="img/datenbank.png" alt="">
        </div>
        <div class="aContainerStart">
            <a class="ahrefs" href="start.php">Start</a>
            <a class="ahrefs" href="admin.php">Table</a>
        </div>
    </nav>
    <div>
        <?php
            if ($results) {
                foreach ($results as $mitarbeiter) {
                    echo "<b>Gefunden: </b>" . htmlspecialchars($mitarbeiter['vorname']) . " " . htmlspecialchars($mitarbeiter['nachname']) . "<br><b> Abteilung: </b>" . htmlspecialchars($mitarbeiter['abteilung']) .
                        "<br> <b>Geburtsdatum: </b>" . htmlspecialchars($mitarbeiter['geburtsdatum']) . "<br><b>Anschrift- Strasse: </b> " . htmlspecialchars($mitarbeiter['strasse']) . "<br><b>Hausnummer: </b> " . htmlspecialchars($mitarbeiter['hnummer']) .
                        " <br><b>Wohnort: </b>  " . htmlspecialchars($mitarbeiter['wohnort']) . "<br> <b>Geburtsort: </b>  " . htmlspecialchars($mitarbeiter['geburtsort']) . "<br>";

                    if (isset($_SESSION['rolle']) && $_SESSION['rolle'] === 'admin') { ?>
        <form action='admin.php' method='POST'>
            <input type='hidden' name='delet_id' value="<?php echo $mitarbeiter['id']; ?>">
            <button type='submit' class='btn-delete'>Löschen</button>
        </form>
        <a href="edit.php?id=<?php echo $mitarbeiter['id']; ?>" class='btn-edit'>Bearbeiten</a>
        <hr>
        <?php } else { ?>
        <span class='adminrechteClass'>Nur Adminrechte</span>;
        <?php }
                }
            } else {
                echo "Mitarbeiter '" . htmlspecialchars($suchbegrief) . "' wurde nicht gefunden.";
            }
}
?>
    </div>
</body>

</html>