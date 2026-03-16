<?php
// 1. Wir müssen die Sitzung erst "laden", um sie beenden zu können
session_start();

// 2. Wir löschen alle Daten, die im $_SESSION-Speicher liegen
session_unset();

// 3. Wir zerstören die Sitzung auf dem Server komplett
session_destroy();

// 4. Jetzt schicken wir den User weg, weil er keine Erlaubnis mehr hat
header("Location: login.php");
exit;
?>