<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shop.css">
</head>

<body>
    <header>
        <div>
            <h1>Mein Online Shop</h1>
        </div>
        <div class="roundName">
            <div class="rund"></div>
            <p class="meinName">Istvan Csovrij</p>
        </div>
    </header>

    <div class="navmenuDeckblat">
        <div class="hrefs">
            <div class="navClass">
                <a class="startClass" href="index.php?page=start"><img class="imgHaus" src="img/home.png"
                        alt="">Start</a>
                <a class="kontactclass" href="index.php?page=contacts"><img class="imgBook" src="img/book.png"
                        alt="">Kontakte</a>
                <a class="legalClass" href="index.php?page=legal"> <img class="imgImpressum" src="img/privacy.png"
                        alt="">Impressum</a>
                <a class="locationClass" href="index.php?page=addcontact"> <img class="imgLocation"
                        src="img/location.png" alt="">Kontakt hinzufügen</a>
            </div>
        </div>

        <div class="deckblatt">
            <div class="deckblatInhalt">
                <?php
                // 1. Variable sicher abrufen
                $page = isset($_GET['page']) ? $_GET['page'] : 'start';
                $headline = "Herzlich willkommen";

                $contacts = [];

                if (file_exists("contacts.txt")) {
                    $text = file_get_contents('contacts.txt', true);
                    $contacts = json_decode($text, true);
                }

                if (isset($_GET['delete'])) {
                    $index = $_GET['delete'];
                    if (isset($contacts[$index])) {
                        unset($contacts[$index]);
                        $contacts = array_values($contacts); // Wichtig für die Reihenfolge!
                        file_put_contents('contacts.txt', json_encode($contacts, JSON_PRETTY_PRINT));
                        header("Location: index.php?page=contacts");
                        exit;
                    }
                }

                if (isset($_POST['name']) && (isset($_POST['phone']))) {
                    echo 'Kontakt ' . $_POST['name'] . 'wurde zugefügt';

                    $newConacts = [
                        'name' => $_POST['name'],
                        'phone' => $_POST['phone']
                    ];
                    array_push($contacts, $newConacts);
                    file_put_contents('contacts.txt', json_encode($contacts, JSON_PRETTY_PRINT));
                }

                // 2. Überschrift festlegen
                if ($page == 'contacts') {
                    $headline = 'Deine Contacte';
                } else if ($page == 'legal') {
                    $headline = 'Impressum';
                } else if ($page == 'addcontact') {
                    $headline = 'Kontact hinzufügen';
                }

                // 3. Überschrift ausgeben
                echo '<h1>' . $headline . '</h1>';

                // 4. Inhalt basierend auf der Seite ausgeben
                if ($page == 'contacts') {
                    echo "<p>Das ist die Contact Seite. Hier hast du deine Contacten.</p>";

                    foreach ($contacts as $index => $row) {
                        $name = $row['name'];
                        $phone = $row['phone'];

                        echo "
        <div class='card'> 
            <img class='profilePicture' src='img/profilePicture.png'> 
            <div class='contact-info'>
                <b>$name</b><br>
                $phone
            </div>
            <div class='card-actions'>
                <a class='phonebutton' href='tel:$phone'>Anrufen</a>
                <a class='deletebutton' href='?page=contacts&delete=$index' 
                   onclick='return confirm(\"Sicher löschen?\")'>Löschen</a>
            </div>
        </div>";
                    }

                } else if ($page == 'legal') {
                    echo '<p>Hier steht das Impressum.</p>';
                } else if ($page == 'addcontact') {
                    echo '<p>Auf dieser Seite kannst du einen weiteren Kontakt hinzufügen</p>
                    <form action= "?page=contacts" method = "POST">
                              <div>
                                  <input type="text" name="name" id="addKontakt" placeholder="Namen eingeben">
                              </div>
                              <div>
                                  <input type="text" name="phone" id="addKontakt" placeholder="Telefon Nummer">
                              </div>
                              <button typ = "submit">Absenden</button>
                    </form>
                    ';
                } else {
                    echo '<p>Das ist die Start Seite</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>