<?php
class UserController extends Controller {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // LIST USER
public function index() {
    // SEARCH
    $keyword = $_GET['search'] ?? '';

    $where = "";
    if ($keyword != "") {
        $key = $this->db->escape($keyword);
        $where = "WHERE nama LIKE '%$key%' OR email LIKE '%$key%'";
    }

    // PAGINATION
    $limit = 5; // jumlah data per halaman
    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1) * $limit;

    // Total data
    $count = $this->db->query("SELECT COUNT(*) AS total FROM users $where")
                      ->fetch_assoc()['total'];

    $total_page = ceil($count / $limit);

    // Ambil data user
    $sql = "SELECT * FROM users $where ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $data['users'] = $this->db->query($sql);

    // Kirim variabel ke view
    $data['page'] = $page;
    $data['total_page'] = $total_page;
    $data['search'] = $keyword;

    $this->view("modules/user/views/index.php", $data);
}

    // FORM TAMBAH
    public function add() {
        $this->view("modules/user/views/add.php");
    }

    // FORM EDIT
    public function edit() {
        $id = $_GET['id'] ?? 0;
        $result = $this->db->query("SELECT * FROM users WHERE id=$id");
        $data['user'] = $result->fetch_assoc();
        $this->view("modules/user/views/edit.php", $data);
    }

    // STORE (INSERT)
    public function store() {
        $nama = $this->db->escape($_POST['nama']);
        $email = $this->db->escape($_POST['email']);
        $password = $this->db->escape($_POST['password']);
        $gender = $this->db->escape($_POST['gender']);
        $agama = $this->db->escape($_POST['agama']);
        $alamat = $this->db->escape($_POST['alamat']);

        // Checkbox (hobi) → ubah jadi string json
        $hobi = isset($_POST['hobi']) ? json_encode($_POST['hobi']) : '[]';

        $sql = "INSERT INTO users (nama,email,password,gender,agama,hobi,alamat)
        VALUES ('$nama','$email','$password','$gender','$agama','$hobi','$alamat')";

        if ($this->db->execute($sql)) {
            header("Location: index.php?mod=user&act=index&status=success");
        }
    }

    // UPDATE
    public function update() {
        $id = $_POST['id'];
        $nama = $this->db->escape($_POST['nama']);
        $email = $this->db->escape($_POST['email']);
        $gender = $this->db->escape($_POST['gender']);
        $agama = $this->db->escape($_POST['agama']);
        $alamat = $this->db->escape($_POST['alamat']);
        $hobi = isset($_POST['hobi']) ? json_encode($_POST['hobi']) : '[]';

        $sql = "UPDATE users SET 
                nama='$nama',
                email='$email',
                gender='$gender',
                agama='$agama',
                hobi='$hobi',
                alamat='$alamat'
                WHERE id=$id";

        if ($this->db->execute($sql)) {
            header("Location: index.php?mod=user&act=index&status=updated");
        }
    }

    // DELETE
    public function delete() {
        $id = $_GET['id'] ?? 0;

        if ($this->db->execute("DELETE FROM users WHERE id=$id")) {
            header("Location: index.php?mod=user&act=index&status=deleted");
        }
    }
}
