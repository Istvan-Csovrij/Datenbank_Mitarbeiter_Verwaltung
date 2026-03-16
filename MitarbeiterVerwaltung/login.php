<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datenbank</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="hezlichh">Herzlich Willkommen Login</h1>
    <nav class="navclassStart">
        <div>
            <img class="datenbankImg" src="img/datenbank.png" alt="">
        </div>
        <div class="aContainerStart">
            <a class="ahrefs" href="start.php">Start</a>
            <a class="ahrefs" href="regist.php">Registrieren</a>
        </div>
    </nav>
    <div class="infoText">
        <h2>Loge dich ein, oder registriere dich, wenn du die Daten-bank nutzen willst!</h2>
    </div>
    <div class="askButContainer">
        <div class="askBut">
            <form action="login_check.php" method="POST">

                <label for="mail">E-Mail</label><br>
                <input type="email" name="mail" placeholder="mmaxmuster@gmail.com" required><br><br>

                <label for="pass">Password</label><br>
                <input type="text" name="pass" placeholder="12345678 @" required><br><br>

                <h3>Bist du schon registriert?</h3>
                <button class="ahrefsRegSeite" type="submit">Einlogen</button>
                <div class="infoText"></div>

            </form>
            <h3>Noch nicht registriert?</h3>
            <a class="ahrefsRegSeite" href="regist.php">Hier registrieren</a>
        </div>
    </div>
    </div>
</body>

</html>