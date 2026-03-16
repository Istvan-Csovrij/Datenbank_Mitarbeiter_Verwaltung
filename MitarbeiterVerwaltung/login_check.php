<?php
session_start();
require_once __DIR__ . "/db_conection.php";

// 1. Prüfen, ob Daten gesendet wurden
if (isset($_POST['mail']) && isset($_POST['pass'])) {
    $mail_eingabe = $_POST['mail'];
    $pass_eingabe = $_POST['pass'];

    // 2. User in der Datenbank anhand der E-Mail suchen
// 1. Der SQL-Befehl (Die Frage an die Datenbank)
    $sql = "SELECT * FROM users WHERE email = ?";
    // 2. Vorbereiten (Sicherheits-Check)
    $stmt = $pdo->prepare($sql);
    // 3. Ausführen (Die E-Mail in das Fragezeichen einsetzen)
    $stmt->execute([$mail_eingabe]);
    // 4. Das Ergebnis abholen
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Wir prüfen: Gibt es den User UND ist das Passwort korrekt?
    if ($user && password_verify($pass_eingabe, $user['passwort'])) {
        $_SESSION['user_id'] = $user['id']; // Wir merken uns die ID
        $_SESSION['rolle'] = $user['rolle'];

        header("Location: dashboard.php");
        exit;
    } else {
        // LOGIN FEHLGESCHLAGEN
        echo "E-Mail oder Passwort falsch!";
        echo '<br><a href="login.php">Zurück zum Login</a>';
    }
} else {
    // Falls jemand die Datei direkt aufruft ohne Formular
    header("Location: login.php");
    exit;
}
?>