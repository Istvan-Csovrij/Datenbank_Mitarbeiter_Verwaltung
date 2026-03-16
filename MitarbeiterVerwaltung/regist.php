<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datenbank</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="hezlichh">Herzlich Willkommen Register</h1>
    <nav class="navclassStart">
        <div>
            <img class="datenbankImg" src="img/datenbank.png" alt="">
        </div>
        <div class="aContainerStart">
            <a class="ahrefs" href="start.php">Start</a>
            <a class="ahrefs" href="login.php">Login</a>
        </div>
    </nav>
    <br><br>

    <form action="registTresor.php" method="POST">

        <label for="mail">E-Mail</label><br>
        <input type="email" name="mailRegist" placeholder="mmaxmuster@gmail.com" required><br><br>

        <label for="pass">Password</label><br>
        <input type="text" name="passRegist" placeholder="12345678 @" required><br><br>

        <button type="submit">Absenden</button>
    </form>

</body>

</html>