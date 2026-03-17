<?php
session_start();
require_once __DIR__ . "/db_conection.php";

if (isset($_SESSION['rolle']) && $_SESSION['rolle'] === 'admin') {
    // JA, du bist Admin -> Jetzt holen wir die Daten
    // 2. ID aus der URL holen
    $id = $_GET['id'] ?? '';

    if ($id) {
        $stmt = $pdo->prepare("SELECT * FROM mitarbeiter WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            die("Mitarbeiter mit ID $id nicht gefunden.");
        }
    } else {
        die("Fehler: Es wurde keine ID zum Bearbeiten übergeben.");
    }
} else {
    // Wenn man kein Admin ist oder gar nicht eingeloggt
    die("Zugriff verweigert: Du hast keine Adminrechte.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="updateEmploye.php" method="post">
        <input type="hidden" name="id" required value="<?php echo $row['id']; ?>">

        <label>Vorname</label>
        <input type="text" name="vorname" required value="<?php echo htmlspecialchars($row['vorname']); ?>"><br><br>

        <label>Nachname</label>
        <input type="text" name="nachname" required value="<?php echo htmlspecialchars($row['nachname']) ?>"><br><br>

        <label>Abteilung</label>
        <input type="text" name="abteilung" required value="<?php echo htmlspecialchars($row['abteilung']) ?>"><br><br>

        <label>Geburtsdatum</label>
        <input type="date" name="geburtsdatum" required
            value="<?php echo htmlspecialchars($row['geburtsdatum']) ?>"><br><br>

        <label>Strasse</label>
        <input type="text" name="strasse" required value="<?php echo htmlspecialchars($row['strasse']) ?>"><br><br>

        <label>Wohnort</label>
        <input type="text" name="wohnort" required value="<?php echo htmlspecialchars($row['wohnort']) ?>"><br><br>

        <label>Hausnummer</label>
        <input type="number" name="hnummer" required value="<?php echo htmlspecialchars($row['hnummer']) ?>"><br><br>

        <label>Geburtsort</label>
        <input type="text" name="geburtsort" required
            value="<?php echo htmlspecialchars($row['geburtsort']) ?>"><br><br>

        <button type="submit">Speichern</button>
    </form>

</body>

</html>