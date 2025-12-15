<?php
// module/article/create.php

$db = (new Database())->connect();
$articleModel = new Article($db);

$message = "";

if (isset($_POST['save_article'])) {

    // Validasi CSRF
    if (!verifyCSRF($_POST['csrf_token'])) {
        $message = "<div class='alert alert-danger'>
                        <i class='bi bi-x-circle'></i> Token tidak valid.
                    </div>";
    } else {

        $judul   = trim($_POST['judul']);
        $isi     = trim($_POST['isi']);
        $kategori= $_POST['kategori'];
        $penulis = $_SESSION['nama']; // admin login

        // Validasi input
        if ($judul === "" || $isi === "") {
            $message = "<div class='alert alert-danger'>
                            <i class='bi bi-x-circle'></i> Judul dan isi wajib diisi.
                        </div>";
        } else {
            // Simpan artikel
            if ($articleModel->create($judul, $isi, $kategori, $penulis)) {
                $message = "<div class='alert alert-success'>
                                <i class='bi bi-check-circle'></i> Artikel berhasil disimpan.
                            </div>";
            } else {
                $message = "<div class='alert alert-danger'>
                                <i class='bi bi-x-circle'></i> Artikel gagal disimpan.
                            </div>";
            }
        }
    }
}
?>

<div class="container mt-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=profile">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.php?page=articles">Artikel</a>
            </li>
            <li class="breadcrumb-item active">Tambah Artikel</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <i class="bi bi-plus-circle"></i> Tambah Artikel Baru
                </div>

                <div class="card-body">

                    <?= $message ?>

                    <form method="post">
                        <input type="hidden" name="csrf_token" value="<?= generateCSRF() ?>">

                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="Teknologi">Teknologi</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Web">Web</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea name="isi" rows="6" class="form-control" required></textarea>
                        </div>

                        <button type="submit" name="save_article" class="btn btn-success w-100">
                            <i class="bi bi-save"></i> Simpan Artikel
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
