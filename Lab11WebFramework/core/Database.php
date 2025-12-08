<?php
class Database {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($this->conn->connect_error) {
                throw new Exception("❌ Koneksi gagal: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Query SELECT
    public function query($sql) {
        $result = $this->conn->query($sql);

        if (!$result) {
            die("❌ Query error: " . $this->conn->error . "<br>SQL: $sql");
        }

        return $result;
    }

    // Query INSERT/UPDATE/DELETE
    public function execute($sql) {
        if ($this->conn->query($sql)) {
            return true;
        } else {
            die("❌ Query gagal: " . $this->conn->error . "<br>SQL: $sql");
        }
    }

    // Escape string
    public function escape($text) {
        return $this->conn->real_escape_string($text);
    }
}
