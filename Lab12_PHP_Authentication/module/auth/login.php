<?php
$db = (new Database())->connect();
$userModel = new User($db);

$message = "";

// Proses login
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($userModel->login($username, $password)) {
        header("Location: index.php?page=profile");
        exit;
    } else {
        $message = "<div class='alert alert-danger'>Username atau password salah.</div>";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </div>
                <div class="card-body">

                    <?= $message ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button name="login" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
