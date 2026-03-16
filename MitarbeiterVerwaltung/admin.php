<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleDatenbank.css">
</head>

<body>

    <head>
        <nav>
            <h2 class="adminunderline">Admin Seite</h2>
            <a class="back" href="formular.php">Zurück</a>
        </nav>
    </head>

    <?php
    require_once __DIR__ . '/db_conection.php';

    // 1. Prüfen: Wurde das Formular mit 'delet_id' abgeschickt?
    if (isset($_POST['delet_id'])) {
        $id = $_POST['delet_id'];

        // 2. Den Löschbefehl vorbereiten
        $stmt = $pdo->prepare('DELETE FROM mitarbeiter WHERE id = ? ');
        //Ausführen
    
        $stmt->execute([$id]);

        // 4. Seite neu laden (damit die ID aus dem Post-Speicher verschwindet)
        header("Location: admin.php?success=1");
        exit;
    }

    $result = $pdo->query("SELECT * FROM mitarbeiter");
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <?php
    // Zeige die Meldung ganz oben an, damit man sie sofort sieht
    if (isset($_GET['success'])) {
        echo "<p style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;'>
            ✅ Mitarbeiter wurde erfolgreich gelöscht!
          </p>";
    }
    ?>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Abteilung</th>
                <th>Ort</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($row as $m) {
                // Wir packen die Daten in schöne HTML-Strukturen innerhalb der Karte
                echo "
                   <tr>
                        <td> " . htmlspecialchars($m['id']) . "</td>
                        <td>" . htmlspecialchars($m['vorname']) . "" . htmlspecialchars($m['nachname']) . "</td>
                        <td>" . htmlspecialchars($m['abteilung']) . "</td>
                        <td> " . htmlspecialchars($m['wohnort']) . "</td>
                        <td>        
                               <form action='admin.php' method='POST' onsubmit=\"return confirm('Wirklich löschen?')\">   
                               <input type = 'hidden' name= 'delet_id' value='" . $m['id'] . "'>
                               <button type='submit' class='btn-delete'>Delet</button>
                               </form>
                        </td>
                  </tr>";
            } ?>
        </tbody>
    </table>
    <?php
    if (isset($_GET['success'])) {
        echo "<p style='color: green;'>Mitarbeiter wurde erfolgreich gelöscht!</p>";
    }
    ?>

</body>

</html>