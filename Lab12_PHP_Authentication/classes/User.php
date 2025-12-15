<?php
// classes/User.php
// Class untuk mengelola autentikasi dan data user

class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil data user berdasarkan ID
    public function getUserById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Login user
    public function login($username, $password) {
        $query = "SELECT * FROM {$this->table} WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cek password dengan password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Regenerasi session ID untuk keamanan
            session_regenerate_id(true);

            // Simpan data penting ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];

            return true;
        }

        return false;
    }

    // Update password user
    public function updatePassword($id, $newPassword) {
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE {$this->table} 
                  SET password = :password, 
                      last_password_change = NOW() 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":password", $hashed);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
