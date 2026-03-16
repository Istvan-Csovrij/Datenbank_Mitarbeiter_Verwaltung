<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="start.css">
</head>

<body>
    <nav class="navMenu">
        <img class="shopLogoClass" src="img/shoppLogo.svg" alt="">
        <div class="aContainer aContainerStart">
            <div class="iconshref"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                    href="start.php">Zurück</a></div>
        </div>
    </nav>
    <main class="mainProfil">
        <div class="profilContainer">
            <form action="">
                <div class="namen" aria-colspan="labelInputs">
                    <div>
                        <label class="labelInputs vrname" for="vorname">Forname</label><br>
                        <input class="labelInputs" type="text" name="vorname" id="vorname" placeholder="Max" required>
                    </div>
                    <div>
                        <label class="labelInputs nrname" for="nachname">Nachname</label><br>
                        <input class="labelInputs" type="text" name="nachname" id="nachname" placeholder="Mustermax"
                            required>
                    </div>
                </div>
                <br><br>
                <div class="labelAreaContainer">
                    <label for="anschrift">Adresse</label><br>
                    <textarea class="area" name="adresse" id="adresse"
                        placeholder="Strasße, Hausnummer, PLZ, Stadt"></textarea>
                </div>
                <div class="buttoncontainerRegist">
                    <button class="speichernButton" type="button">Speichern</button>

                    <a href="index.php">
                        <button class="butonNavRegist" type="button">Zurück</button>
                    </a>
                </div>

            </form>
        </div>
    </main>

    <p><strong>Adresse:</strong><br>
        Kronenstraße 22<br>
        70173 Stuttgart</p>
</body>

</html>