<?php
// module/article/detail.php

// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='container mt-5 alert alert-danger'>Artikel tidak ditemukan.</div>";
    return;
}

$db = (new Database())->connect();
$articleModel = new Article($db);

// Ambil artikel berdasarkan ID
$article = $articleModel->getById($_GET['id']);

if (!$article) {
    echo "<div class='container mt-5 alert alert-danger'>Artikel tidak ditemukan.</div>";
    return;
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
            <li class="breadcrumb-item active">
                <?= htmlspecialchars($article['judul']) ?>
            </li>
        </ol>
    </nav>

    <!-- Artikel -->
    <article class="mt-4">

        <h1 class="fw-bold mb-3">
            <?= htmlspecialchars($article['judul']) ?>
        </h1>

        <div class="mb-4 text-muted">
            <span class="me-3">
                <i class="bi bi-person"></i> <?= htmlspecialchars($article['penulis']) ?>
            </span>
            <span class="me-3">
                <i class="bi bi-folder"></i> <?= htmlspecialchars($article['kategori']) ?>
            </span>
            <span>
                <i class="bi bi-calendar"></i>
                <?= date("d F Y", strtotime($article['created_at'])) ?>
            </span>
        </div>

        <div class="fs-5 lh-lg">
            <?= nl2br(htmlspecialchars($article['isi'])) ?>
        </div>

        <div class="mt-5">
            <a href="index.php?page=articles" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Artikel
            </a>
        </div>

    </article>

</div>
