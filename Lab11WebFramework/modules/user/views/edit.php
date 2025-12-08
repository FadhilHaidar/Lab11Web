<?php
// modules/user/views/edit.php
?>

<div class="container py-4">
    <h3 class="fw-bold mb-4">Edit User</h3>

    <form action="index.php?mod=user&act=update" method="POST" id="form-edit">

        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <script>
        document.getElementById("avatarInput").addEventListener("change", function(){
            const file = this.files[0];
            if (!file) return;

            const preview = document.getElementById("avatarPreview");
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        });
        </script>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option <?= $user['gender']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
                    <option <?= $user['gender']=='Perempuan'?'selected':'' ?>>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select">
                    <option <?= $user['agama']=='Islam'?'selected':'' ?>>Islam</option>
                    <option <?= $user['agama']=='Kristen'?'selected':'' ?>>Kristen</option>
                    <option <?= $user['agama']=='Hindu'?'selected':'' ?>>Hindu</option>
                    <option <?= $user['agama']=='Buddha'?'selected':'' ?>>Buddha</option>
                    <option <?= $user['agama']=='Konghucu'?'selected':'' ?>>Konghucu</option>
                </select>
            </div>

            <!-- Hobi -->
            <?php $hobiUser = json_decode($user['hobi'], true) ?: []; ?>

            <div class="col-md-6">
                <label class="form-label">Hobi</label><br>
                <input type="checkbox" name="hobi[]" value="Membaca" <?= in_array('Membaca', $hobiUser)?'checked':'' ?>> Membaca  
                <input type="checkbox" name="hobi[]" value="Gaming" <?= in_array('Gaming', $hobiUser)?'checked':'' ?>> Gaming  
                <input type="checkbox" name="hobi[]" value="Olahraga" <?= in_array('Olahraga', $hobiUser)?'checked':'' ?>> Olahraga  
                <input type="checkbox" name="hobi[]" value="Musik" <?= in_array('Musik', $hobiUser)?'checked':'' ?>> Musik  
            </div>

            <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"><?= $user['alamat'] ?></textarea>
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">💾 Update</button>
        </div>

    </form>
</div>
