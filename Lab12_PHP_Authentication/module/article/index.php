<?php
// module/article/index.php
$db = (new Database())->connect();
$articleModel = new Article($db);

$articles = $articleModel->getAll();
?>

<div class="container mt-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=profile">Home</a>
            </li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="bi bi-journal-text"></i> Daftar Artikel
        </h3>

        <a href="index.php?page=article_create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Artikel
        </a>
    </div>

    <div class="row">
        <?php if (count($articles) > 0): ?>
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <div class="card-body">
                            <span class="badge bg-primary mb-2">
                                <?= htmlspecialchars($article['kategori']) ?>
                            </span>

                            <h5 class="card-title">
                                <?= htmlspecialchars($article['judul']) ?>
                            </h5>

                            <p class="card-text text-muted">
                                <?= substr(strip_tags($article['isi']), 0, 120) ?>...
                            </p>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-between">
                            <small class="text-muted">
                                <?= date("d M Y", strtotime($article['created_at'])) ?>
                            </small>

                            <a href="index.php?page=article_detail&id=<?= $article['id'] ?>"
                               class="btn btn-sm btn-outline-primary">
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning">
                    Belum ada artikel.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
