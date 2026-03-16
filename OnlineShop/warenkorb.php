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
                <div class="aContainer ">
                        <div class="iconshref"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                                        href=" index.php">Home</a></div>
                        <div class="iconshref"><img class="img" src="img/location.png" alt=""><a class="hrefsClass"
                                        href=" Location.php">Location</a></div>
                        <div class="iconshref"><img class="img" src="img/home.png" alt=""><a class="hrefsClass"
                                        href=" start.php">Zurück</a></div>

                </div>
        </nav>

        <main class="formContainer">
                <div class="card-white">
                        <h2>Warenkorb</h2>
                        <form action="">
                                <div class="angabefelder">
                                        <div>
                                                <label class="inputs lab" for="artikel">Artikel</label><br>
                                                <input class="inputs" type="text" name="artikel" id="artikel"
                                                        placeholder="zB. Kopfhörer">
                                        </div>
                                        <div>
                                                <label class="inputs lab" for="number">Menge</label><br>
                                                <input class="inputs" type="number" name="number" id="number" min="1"
                                                        value="1">
                                        </div>

                                </div>
                                <div class="buttoncontainerRegist buttonsContainer">
                                        <button class="übernehmenButton">Übernehmen</button>
                                        <button class="zurückButton">Zurück</button>
                                </div>
                        </form>

                </div>
        </main>

</body>

</html>