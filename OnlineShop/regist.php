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
            <div class="iconshref iconshrefStart"><img class="img" src="img/login.png" alt=""><a
                    class="hrefsClass hrefsClassStart" href=" login.php">Login</a></div>
            <div class="iconshref iconshrefStart"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                    href="start.php">Zurück</a></div>
        </div>
    </nav>
    <br><br>
    <h2>Hier kannst du dich registrieren</h2>
    <form action="login.php" method="get" class="form">
        <label class="formFeilds" for="vorname">Vorname</label><br>
        <input class="formFeilds" type="text" name="vorname" id="vorname" required><br><br>

        <label class="formFeilds" for="nachname">Nachname</label><br>
        <input class="formFeilds" type="text" name="nachname" id="nachname" required><br><br>

        <label class="formFeilds" for="email">Email</label><br>
        <input class="formFeilds" type="email" name="email" id="email" required><br><br>

        <label class="formFeilds" for="pasword">Pasword</label><br>
        <input class="formFeilds" type="password" name="pasword" id="password" required><br><br>

        <label class="formFeilds" for="passwordRepeat">Password Widerholen</label><br>
        <input class="formFeilds" type="password" name="passwordRepeat" id="passwordRepeat" required><br><br>

        <div class="buttoncontainerRegist">
            <button class="butonNavRegist" type="submit">Registrieren</button>
        </div>
    </form>


</body>

</html>