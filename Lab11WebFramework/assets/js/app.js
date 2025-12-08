// app.js
// Fungsi JS untuk: dark-mode, gallery modal, simple animations, dan autosave draft
// Semua komentar dalam Bahasa Indonesia agar mudah dimengerti pemula.

document.addEventListener('DOMContentLoaded', function () {
  // DARK MODE: toggle & simpan preferensi di localStorage
  const dmToggle = document.getElementById('dm-toggle');
  const body = document.getElementById('page-body');

  // muat preferensi
  const prefers = localStorage.getItem('lab11_darkmode');
  if (prefers === '1') body.classList.add('dark');

  dmToggle && dmToggle.addEventListener('click', () => {
    const isDark = body.classList.toggle('dark');
    localStorage.setItem('lab11_darkmode', isDark ? '1' : '0');
    dmToggle.textContent = isDark ? '☀️ Mode Terang' : '🌙 Mode Gelap';
  });

  // GALLERY: buka modal saat klik gambar
  const galleryGrid = document.getElementById('gallery-grid');
  const galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));
  const galleryModalImg = document.getElementById('gallery-modal-img');

  galleryGrid && galleryGrid.addEventListener('click', (e) => {
    const img = e.target.closest('img');
    if (!img) return;
    const src = img.getAttribute('src');
    galleryModalImg.setAttribute('src', src);
    galleryModal.show();
  });

  // Fade-in element saat load
  document.querySelectorAll('.card').forEach((el, idx) => {
    el.classList.add('fade-in');
    el.style.animationDelay = (idx * 40) + 'ms';
  });

  // AUTOSAVE DRAFT: contoh fungsi, bisa dipakai di form user
  window.saveDraft = function (key, dataObj) {
    try {
      localStorage.setItem(key, JSON.stringify(dataObj));
      showToast('Draft tersimpan otomatis.');
    } catch (err) {
      console.error('Gagal menyimpan draft', err);
    }
  };

  window.loadDraft = function (key) {
    try {
      const raw = localStorage.getItem(key);
      return raw ? JSON.parse(raw) : null;
    } catch (err) {
      console.error('Gagal memuat draft', err);
      return null;
    }
  };

  window.clearDraft = function (key) {
    localStorage.removeItem(key);
    showToast('Draft dihapus.');
  };

  // Simple toast/toggle notifications
  function showToast(message) {
    // Buat elemen toast sementara
    const t = document.createElement('div');
    t.className = 'position-fixed top-0 end-0 m-3 p-2 bg-primary text-white rounded shadow';
    t.style.zIndex = 1080;
    t.style.opacity = '0.95';
    t.textContent = message;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 2200);
  }

});
