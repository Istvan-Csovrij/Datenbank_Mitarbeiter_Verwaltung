<?php
final class Database
{
    private $host = null;
    private $db_name = null;
    private $username = null;
    private $password = null;
    public $conn;

    public function dbConnection(): ?PDO
    {
        $this->setupParams();
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Verbindung fehlgeschlagen: " . $exception->getMessage();
        }
        return $this->conn;
    }

    private function setupParams(): void
    {
        // Pfad korrigiert: Raus aus 'classes', rein in 'config'
        $config = parse_ini_file(__DIR__ . "/../config/sql.inc.php");

        $this->host = $config["host"];
        $this->db_name = $config["db"];
        $this->username = $config["uid"];
        $this->password = $config["pwd"];
    }
}

?>