<?php
require_once('classes/database.php');

$database = new Database();
$db = $database->dbConnection();

$produkte = [];
if ($db) {
    // Exakte Spaltennamen aus deinem phpMyAdmin Screenshot genutzt
    $sql = "SELECT Artikel_ID, Artikel_Name, Hersteller, Preis FROM produkte";
    $stmt = $db->query($sql);
    $produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>CityShop - Produkte</title>
    <link rel="stylesheet" href="shop.css">
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .price {
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>

<body>
    <nav class="navMenu"> </nav>

    <main class="product-grid">
        <?php foreach ($produkte as $p): ?>
            <div class="product-card">
                <h3><?= htmlspecialchars($p['Artikel_Name']) ?></h3>
                <p>Hersteller: <?= htmlspecialchars($p['Hersteller']) ?></p>
                <p class="price"><?= number_format($p['Preis'], 2, ',', '.') ?> €</p>
                <button>Details ansehen</button>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>