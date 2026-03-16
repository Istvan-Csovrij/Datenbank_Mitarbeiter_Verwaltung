<?php
require_once __DIR__ . '/../src/database.php';

try {
    $pdo = Database::connect(__DIR__ . '/../config/db.json');
    $stmt = $pdo->query("SELECT Artikel_ID, Artikel_Name, Hersteller, Preis FROM produkte ORDER BY Artikel_ID ASC");
    $products = $stmt->fetchAll();
} catch (Exception $e) {
    die('Fehler beim Verbinden: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Mein Shop - Home</title>
    <style>
    .product-card {
        border: 1px solid #ccc;
        margin: 10px;
        padding: 15px;
        display: flex;
        /* Bild und Text nebeneinander */
        gap: 20px;
        align-items: center;
        border-radius: 8px;
    }

    .product-image {
        width: 120px;
        /* Einheitliche Breite für alle Bilder */
        height: auto;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <h1>Willkommen in meinem Shop</h1>

    <?php foreach ($products as $p): ?>
    <div class="product-card">
        <div class="product-image">
            <?php if (!empty($p['Artikel_ID'])): ?>
            <img src="product_image.php?id=<?= $p['Artikel_ID'] ?>" alt="<?= htmlspecialchars($p['Artikel_Name']) ?>">
            <?php else: ?>
            <img src="public/images/placeholder.jpg" alt="Kein Bild verfügbar">
            <?php endif; ?>
        </div>

        <h3><?= htmlspecialchars($p['Artikel_Name']) ?></h3>
        <p class="manufacturer"><?= htmlspecialchars($p['Hersteller']) ?></p>
        <p class="price"><?= number_format($p['Preis'], 2, ',', '.') ?> €</p>
        <button class="buy-btn">In den Warenkorb</button>
    </div>
    <?php endforeach; ?>

</body>

</html>