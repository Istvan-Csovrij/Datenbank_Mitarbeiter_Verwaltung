<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Kundenformular</title>
    <style>
        /* Ein wenig Styling, damit es ordentlich aussieht */
        body {
            font-family: sans-serif;
            padding: 20px;
            line-height: 1.6;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 300px;
            padding: 5px;
            margin-bottom: 5px;
        }

        .checkbox {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <form method="post" action="">
        <label for="nachname">Nachname</label>
        <input type="text" name="nachname" id="nachname" required>

        <label for="vorname">Vorname</label>
        <input type="text" name="vorname" id="vorname" required>

        <label for="email">E-Mail</label>
        <input type="email" name="email" id="email" required>

        <label for="passwort">Passwort</label>
        <input type="password" name="passwort" id="passwort" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="agb" value="1" required>
                Ich akzeptiere die AGB
            </label>
        </div>

        <button type="submit">Speichern</button>
    </form>

</body>

</html>