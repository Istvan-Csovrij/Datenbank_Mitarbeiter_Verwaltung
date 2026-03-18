<?php
session_start();

// 1. ZUGRIFFSKONTROLLE (Immer ganz oben!)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/db_conection.php';

// 2. LÖSCH-LOGIK (Muss vor der Abfrage der Tabelle passieren)
if (isset($_POST['delet_id'])) {
    $id = $_POST['delet_id'];
    $stmt = $pdo->prepare('DELETE FROM mitarbeiter WHERE id = ?');
    $stmt->execute([$id]);

    header("Location: admin.php?success=1");
    exit;
}

// 3. DATEN LADEN
$result = $pdo->query("SELECT * FROM mitarbeiter");
$row = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mitarbeiterverwaltung</title>
    <link rel="stylesheet" href="styleDatenbank.css">
</head>

<body>
    <nav>
        <h2 class="adminunderline">Admin Seite</h2>
        <form action="search.php" method="GET">
            <label for="search">Mitarbeiter suchen: </label>
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Suchen</button>
        </form>
        <div class="addLogoutHrefs">
            <a class="backadd" href="add.php">ADD</a>
            <a class="backadd" href="logout.php">Logout</a>
        </div>
    </nav>

    <?php if (isset($_GET['success'])): ?>
    <p style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px;'>
        ✅ Mitarbeiter wurde erfolgreich gelöscht!
    </p>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Abteilung</th>
                <th>Geburtdatum</th>
                <th>Strasse</th>
                <th>Hausnummer</th>
                <th>Ort</th>
                <th>Geburtsort</th>
                <th>Aktion</th>
                <th>Bearbeiten</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($row as $m): ?>
            <tr>
                <td><?php echo htmlspecialchars($m['id']); ?></td>
                <td><?php echo htmlspecialchars($m['vorname'] . " " . $m['nachname']); ?></td>
                <td><?php echo htmlspecialchars($m['abteilung']); ?></td>
                <td><?php echo !empty($m['geburtsdatum']) ? date("d.m.Y", strtotime($m['geburtsdatum'])) : '-'; ?></td>
                <td><?php echo htmlspecialchars($m['strasse']) ?></td>
                <td><?php echo htmlspecialchars($m['hnummer']) ?></td>
                <td><?php echo htmlspecialchars($m['wohnort']); ?></td>
                <td><?php echo htmlspecialchars($m['geburtsort']) ?></td>

                <td>
                    <?php if ($_SESSION['rolle'] === 'admin'): ?>
                    <form action='admin.php' method='POST' onsubmit="return confirm('Wirklich löschen?')">
                        <input type='hidden' name='delet_id' value='<?php echo $m['id']; ?>'>
                        <button type='submit' class='btn-delete'>Löschen</button>
                    </form>
                    <?php else: ?>
                    <span class="adminrechteClass">Nur Adminrechte</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($_SESSION['rolle'] === 'admin'): ?>
                    <a href="edit.php?id=<?php echo $m['id']; ?>" class='btn-edit'>Bearbeiten</a>
                    <?php else: ?>
                    <span class="adminrechteClass">Nur Adminrechte</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>

</body>

</html>