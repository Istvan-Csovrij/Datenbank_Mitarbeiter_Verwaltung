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
        <div>
            <img class="shopLogoClass" src="img/shoppLogo.svg" alt="">
        </div>
        <div class="aContainer aContainerStart">
            <div class="iconshref iconshrefStart"><img class="img" src="img/register.png" alt=""><a class="hrefsClass"
                    href=" regist.php">Registrieren</a></div>
            <div class="iconshref iconshrefStart"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                    href="start.php">Zurück</a></div>
        </div>
    </nav>

    <main class="main">

        <div class="formContainer">
            <form action="index.php" method="get" class="form">
                <div class="labelInputContainer">
                    <label class="formFeilds" for="email">E-Mail</label><br>
                    <input class="formFeilds" type="email" name="email" id="email" placeholder="mustername@.com"
                        required><br><br>

                    <label class="formFeilds" for="password">Passwort</label><br>
                    <input class="formFeilds" type="password" name="pasword" id="password" placeholder="......"
                        required><br><br>
                    <div class="buttoncontainer">
                        <button class="butonNav" type="submit" class="hrefsClass">Einloggen</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>