<?php
/**
 * 1. DATENBANK-LOGIK (Muss ganz oben stehen!)
 */
require_once 'Database.php'; // Pfad korrigiert (ohne src/)

$produkte = []; // Initialisierung als leeres Array, um Fehler in der Schleife zu vermeiden

try {
    // Verbindung holen - Wir nutzen den Standardpfad aus der Klasse
    $db = Database::connect();

    // Daten auslesen
    $stmt = $db->query("SELECT * FROM produkte");
    $produkte = $stmt->fetchAll();
} catch (Exception $e) {
    // Fehlerfall: Wir speichern die Nachricht für später
    $errorMessage = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityShop - Einkauf</title>
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="start.css">
</head>

<body>

    <nav class="navMenu">
        <img class="shopLogoClass" src="img/shoppLogo.svg" alt="CityShop Logo">
        <div class="aContainer aContainerStart">
            <div class="iconshref"><img class="img" src="img/profil.png" alt=""><a class="hrefsClass"
                    href="profil.php">Profil</a></div>
            <div class="iconshref"><img class="img" src="img/shopingCard.png" alt=""><a class="hrefsClass"
                    href="warenkorb.php">Warenkorb</a></div>
            <div class="iconshref"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                    href="start.php">Zurück</a></div>
        </div>
    </nav>

    <main class="content-container">
        <h2>Unsere Produkte</h2>

        <?php if (isset($errorMessage)): ?>
            <div style="background: #ffcccc; padding: 10px; border: 1px solid red;">
                Fehler beim Laden der Produkte: <?= $errorMessage ?>
            </div>
        <?php endif; ?>

        <div class="product-grid">
            <?php foreach ($produkte as $einzelnesProdukt): ?>
                <div class="product-card">
                    <img src="img/produkt1.jpg" alt="Produktbild" class="product-img">
                    <div class="product-info">
                        <h3><?= htmlspecialchars($einzelnesProdukt['Artikel_Name'] ?? 'Unbekanntes Produkt') ?></h3>
                        <p><?= htmlspecialchars($einzelnesProdukt['Hersteller'] ?? '') ?></p>
                        <span class="price"><?= number_format($einzelnesProdukt['Preis'] ?? 0, 2, ',', '.') ?> €</span>
                        <a href="warenkorb.php?add=<?= $einzelnesProdukt['Artikel_ID'] ?>" class="butonNavRegist">In den
                            Warenkorb</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($produkte) && !isset($errorMessage)): ?>
                <p>Momentan sind keine Produkte verfügbar.</p>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>