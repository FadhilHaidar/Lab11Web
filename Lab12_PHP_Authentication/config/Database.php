<?php
// config/Database.php
// Class untuk koneksi database menggunakan PDO

class Database {
    private $host = "localhost";
    private $db_name = "latihan_oop";
    private $username = "root";
    private $password = "";
    public $conn;

    // Method untuk membuat koneksi
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            // Set error mode PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }

        return $this->conn;
    }
}
