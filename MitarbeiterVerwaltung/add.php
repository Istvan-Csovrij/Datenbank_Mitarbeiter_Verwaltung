<?php
$array_schluessel = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitarbeiter Datenbank</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navclass">
            <h2 class="formularUnderline">Registrieren</h2>
            <div class="aContainer">
                <a class="ahrefs" href="start.php">Start</a>
                <a class="ahrefs" href="login.php">Login</a>
                <a class="ahrefs" href="regist.php">Registrieren</a>
                <a class="ahrefs" href="admin.php">Admin</a>
            </div>
        </nav>
    </header>

    <mai>
        <div class="formPrivider">
            <div>
                <form class="formClassForm" action="save_employe/saveEmploye.php" method="POST">
                    <label>Vorname:</label><br>
                    <input type="text" name="vorname" placeholder="Max" required><br><br>

                    <label>Nachname:</label><br>
                    <input type="text" name="nachname" placeholder="Musterman" required><br><br>

                    <label>Geburtsdatum:</label><br>
                    <input type="date" name="geburtsdatum" required><br><br>

                    <label>Straße + Hausnummer:</label><br>
                    <input type="text" name="strHausnummer" list="strassenVorschlaege" placeholder="z.B. Musterstraße 1"
                        autocomplete="off" required>
                    <datalist id="strassenVorschlaege">
                        <option value="Musterstraße 1">
                        <option value="Hauptstraße 10">
                        <option value="Berliner Allee 5">
                    </datalist>
                    <br><br>
            </div>
            <div class="formtoo">
                <label>Wohnort:</label><br>
                <input type="text" name="wohnort" list="wohnortVorschlaege" placeholder="z.B. Musterstraße 1"
                    autocomplete="off" required>
                <datalist id="wohnortVorschlaege">
                    <option value="Heidelberg">Heidelberg</option>
                    <option value="Mannheim">Mannheim</option>
                    <option value="Berlin">Berlin</option>
                </datalist><br><br>

                <label>Geburtsort:</label><br>
                <input type="text" name="wohnort" list="geburtsortVorschlag" placeholder="z.B. Musterstraße 1"
                    autocomplete="off" required>
                <datalist id="geburtsortVorschlag">
                    <option value="Heidelberg">Heidelberg</option>
                    <option value="Speyer">Speyer</option>
                    <option value="Karlsruhe">Karlsruhe</option>
                </datalist><br><br>

                <label>Abteilung:</label><br>
                <input type="text" name="abteilung" list="abteilungVorschlag" placeholder="Berufsumfeld"
                    autocomplete="off" required>
                <datalist id="abteilungVorschlag">
                    <option value="IT">IT</option>
                    <option value="HR">Personalwesen</option>
                    <option value="Marketing">Marketing</option>
                </datalist><br><br><br>

                <button type="submit">Mitarbeiter in DB speichern</button>
                </form>
            </div>
        </div>
        </main>

</body>

</html>