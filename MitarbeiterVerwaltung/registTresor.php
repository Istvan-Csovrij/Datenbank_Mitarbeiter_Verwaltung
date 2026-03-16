<?php
require_once __DIR__ . "db_conection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mailRegist = $_POST['mailRegist'];
    $password_klartextRegist = $_POST['passRegist'];
    $rolle = 'user';

    $gehastesPasswortRegister = password_hash($password_klartextRegist, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO users(email, passwort, rolle) VALUEs (?, ?, ? )";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mailRegist, $gehastesPasswortRegister, $rolle]);

        echo 'Erfolg! Der eine neue Account wurde erstellt.
        <a href="login.php>Login</';


    } catch (PDOException $e) {
        echo "Fehler beim erstellen: " . $e->getMessage();
    }
}

?>