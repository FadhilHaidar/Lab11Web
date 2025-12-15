<?php
// classes/Article.php
// Class untuk mengelola data artikel (CRUD)

class Article {
    private $conn;
    private $table = "articles";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil semua artikel (terbaru dulu)
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil artikel berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah artikel baru
    public function create($judul, $isi, $kategori, $penulis) {
        $query = "INSERT INTO {$this->table} 
                  (judul, isi, kategori, penulis) 
                  VALUES (:judul, :isi, :kategori, :penulis)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":judul", $judul);
        $stmt->bindParam(":isi", $isi);
        $stmt->bindParam(":kategori", $kategori);
        $stmt->bindParam(":penulis", $penulis);

        return $stmt->execute();
    }
}
