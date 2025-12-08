<?php
// modules/user/views/add.php
?>

<div class="container py-4">
    <h3 class="fw-bold mb-4">Tambah User Baru</h3>

    <form action="index.php?mod=user&act=store" method="POST" enctype="multipart/form-data" id="form-user">

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Buddha</option>
                    <option>Konghucu</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Hobi</label><br>
                <input type="checkbox" name="hobi[]" value="Membaca"> Membaca  
                <input type="checkbox" name="hobi[]" value="Gaming"> Gaming  
                <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga  
                <input type="checkbox" name="hobi[]" value="Musik"> Musik  
            </div>

            <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Avatar (opsional)</label>
                <input type="file" name="avatar" class="form-control" accept="image/*" id="avatarInput">
                <img id="avatarPreview" class="mt-2 rounded border" style="width: 120px; height:120px; object-fit: cover; display:none;">
            </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">💾 Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="clearDraft('draft_add')">🗑 Hapus Draft</button>
        </div>

    </form>
</div>

<script>
// Autosave draft
const form = document.getElementById("form-user");

setInterval(() => {
    let data = {
        nama: form.nama.value,
        email: form.email.value,
        alamat: form.alamat.value
    };
    saveDraft("draft_add", data);
}, 1500);

// Load draft saat halaman dibuka
window.onload = () => {
    let draft = loadDraft("draft_add");
    if (draft) {
        form.nama.value = draft.nama ?? "";
        form.email.value = draft.email ?? "";
        form.alamat.value = draft.alamat ?? "";
    }
};
</script>