<?php
// modules/user/views/index.php
?>

<div class="container py-4">

    <!-- Status alert -->
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success">
            <?= $_GET['status'] === 'success' ? 'Data berhasil ditambahkan!' : '' ?>
            <?= $_GET['status'] === 'updated' ? 'Data berhasil diperbarui!' : '' ?>
            <?= $_GET['status'] === 'deleted' ? 'Data berhasil dihapus!' : '' ?>
        </div>
    <?php endif; ?>

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="fw-bold">Daftar User</h3>

        <div class="d-flex gap-2">
            <!-- Switch tampilan -->
            <button class="btn btn-outline-primary btn-sm" id="btn-table">📄 Tabel</button>
            <button class="btn btn-outline-secondary btn-sm" id="btn-card">🗂️ Kartu</button>

            <a href="index.php?mod=user&act=add" class="btn btn-primary">
                ➕ Tambah User
            </a>
        </div>
    </div>

    <!-- TAMPILAN TABEL -->
    <div id="view-table">
      <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Daftar User</h3>

    <div class="d-flex gap-2">
        <form class="d-flex" method="GET" action="">
            <input type="hidden" name="mod" value="user">
            <input type="hidden" name="act" value="index">
            <input type="text" name="search" class="form-control form-control-sm" 
                   placeholder="Cari user..." value="<?= $search ?>">
            <button class="btn btn-primary btn-sm ms-2">🔍 Cari</button>
        </form>

        <button class="btn btn-outline-primary btn-sm" id="btn-table">📄 Tabel</button>
        <button class="btn btn-outline-secondary btn-sm" id="btn-card">🗂️ Kartu</button>

        <a href="index.php?mod=user&act=add" class="btn btn-success btn-sm">
            ➕ Tambah User
        </a>
    </div>
</div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-white">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Agama</th>
                        <th>Hobi</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($row = $users->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['agama'] ?></td>
                        <td>
                            <?php
                                $hobi = json_decode($row['hobi'], true);
                                echo implode(", ", $hobi ?: []);
                            ?>
                        </td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <a href="index.php?mod=user&act=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                            <a href="index.php?mod=user&act=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑 Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- TAMPILAN KARTU -->
    <div id="view-card" class="row g-3 d-none">
        <?php
        $users->data_seek(0);
        while ($row = $users->fetch_assoc()):
        ?>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-1"><?= $row['nama'] ?></h5>
                    <p class="text-muted small mb-1"><?= $row['email'] ?></p>

                    <p class="small mb-1">Gender: <b><?= $row['gender'] ?></b></p>
                    <p class="small mb-1">Agama: <b><?= $row['agama'] ?></b></p>
                    <p class="small mb-1">Hobi: 
                        <b>
                        <?php
                            $hobi = json_decode($row['hobi'], true);
                            echo implode(", ", $hobi ?: []);
                        ?>
                        </b>
                    </p>
                    <p class="small">Alamat: <b><?= $row['alamat'] ?></b></p>

                    <div class="mt-3 d-flex gap-2">
                        <a href="index.php?mod=user&act=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                        <a href="index.php?mod=user&act=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">🗑 Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

</div>

<script>
document.getElementById('btn-card').onclick = function(){
    document.getElementById('view-card').classList.remove('d-none');
    document.getElementById('view-table').classList.add('d-none');
};

document.getElementById('btn-table').onclick = function(){
    document.getElementById('view-table').classList.remove('d-none');
    document.getElementById('view-card').classList.add('d-none');
};
</script>

<div class="mt-4">
    <nav>
        <ul class="pagination justify-content-center">

            <!-- Tombol Prev -->
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="index.php?mod=user&act=index&page=<?= $page - 1 ?>&search=<?= $search ?>">
                    « Prev
                </a>
            </li>

            <!-- Nomor halaman -->
            <?php for($i = 1; $i <= $total_page; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" 
                       href="index.php?mod=user&act=index&page=<?= $i ?>&search=<?= $search ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <!-- Tombol Next -->
            <li class="page-item <?= ($page >= $total_page) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="index.php?mod=user&act=index&page=<?= $page + 1 ?>&search=<?= $search ?>">
                    Next »
                </a>
            </li>
        </ul>
    </nav>
</div>
