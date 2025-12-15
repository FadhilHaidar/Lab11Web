<?php
// module/user/profile.php

$db = (new Database())->connect();
$userModel = new User($db);

// Ambil data user dari session
$user = $userModel->getUserById($_SESSION['user_id']);

$message = "";

// Proses ubah password
if (isset($_POST['change_password'])) {

    // Validasi CSRF
    if (!verifyCSRF($_POST['csrf_token'])) {
        $message = "<div class='alert alert-danger'>Token tidak valid.</div>";
    } else {

        $old = trim($_POST['old_password']);
        $new = trim($_POST['new_password']);
        $confirm = trim($_POST['confirm_password']);

        // Cek password lama
        if (!password_verify($old, $user['password'])) {
            $message = "<div class='alert alert-danger'><i class='bi bi-x-circle'></i> Password lama salah.</div>";
        }
        // Cek password baru & konfirmasi
        elseif ($new !== $confirm) {
            $message = "<div class='alert alert-warning'><i class='bi bi-exclamation-circle'></i> Konfirmasi password tidak cocok.</div>";
        }
        // Cegah password sama
        elseif (password_verify($new, $user['password'])) {
            $message = "<div class='alert alert-warning'>Password baru tidak boleh sama dengan password lama.</div>";
        }
        // Update password
        else {
            if ($userModel->updatePassword($user['id'], $new)) {
                // Logout otomatis
                session_destroy();
                header("Location: index.php?status=success");
                exit;
            } else {
                $message = "<div class='alert alert-danger'>Gagal memperbarui password.</div>";
            }
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">

        <!-- Dashboard Card -->
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="bi bi-person-badge fs-1 text-primary"></i>
                    <h5 class="mt-3"><?= htmlspecialchars($user['nama']) ?></h5>
                    <p class="text-muted">@<?= htmlspecialchars($user['username']) ?></p>

                    <span class="badge bg-success">
                        <i class="bi bi-check-circle"></i> Login Aktif
                    </span>

                    <?php if ($user['last_password_change']) : ?>
                        <p class="mt-3 small text-muted">
                            Password terakhir diubah:<br>
                            <?= date("d M Y H:i", strtotime($user['last_password_change'])) ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Form Change Password -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <i class="bi bi-key-fill"></i> Ubah Password
                </div>
                <div class="card-body">

                    <?= $message ?>

                    <form method="post">
                        <input type="hidden" name="csrf_token" value="<?= generateCSRF() ?>">

                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="old_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <button type="submit" name="change_password" class="btn btn-primary w-100">
                            <i class="bi bi-arrow-repeat"></i> Perbarui Password
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
