# 🏡 Portal Nagari Kubang Koto Berapak

Website resmi Nagari Kubang Koto Berapak, Kecamatan Bayang, Kabupaten Pesisir Selatan, Sumatera Barat.  
Dikembangkan melalui program KKN Universitas Andalas Periode 1 dan 2 Tahun 2026.

---

## ✨ Fitur Utama

**Halaman Publik**
- Profil, sejarah, dan visi-misi nagari
- Berita & kegiatan nagari
- Katalog UMKM warga
- Data kelompok tani & hasil panen
- Galeri foto dokumentasi
- Lembaga & struktur organisasi nagari (dengan foto lokasi)
- Pengaduan masyarakat via QR Code / Google Form
- Peta potensi wilayah nagari

**Panel Admin**
- Dashboard statistik konten
- Kelola semua konten website (berita, UMKM, galeri, lembaga, struktur, kelompok tani, data panen)
- Pengaturan website (slogan, visi, misi, kontak, dll) tanpa ubah kode
- Halaman panduan penggunaan + video demonstrasi untuk operator nagari

---

## 🛠 Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Backend | Laravel 12 (PHP 8.3) |
| Database | MySQL |
| Frontend | Blade Template + Vanilla CSS |
| Build Tool | Vite 7 |
| Auth | Laravel Breeze |

---

## 🚀 Setup Lokal (untuk Developer)

```bash
# 1. Clone repository
git clone https://github.com/kaivanfajri/kubangkotoberapak.git
cd kubangkotoberapak

# 2. Install dependencies
composer install
npm install

# 3. Salin dan konfigurasi environment
cp .env.example .env
# Edit .env: isi DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. Generate app key
php artisan key:generate

# 5. Jalankan migrasi dan seeder
php artisan migrate --seed

# 6. Buat symbolic link storage
php artisan storage:link

# 7. Jalankan development server
npm run dev
php artisan serve
```

Akses website di: `http://localhost:8000`

---

## 🔐 Login Admin

| Field | Value |
|-------|-------|
| URL | `/login` |
| Email | `admin@nagari.id` |
| Password | `password` |

> ⚠️ Ganti password segera setelah deploy ke production.

---

## 🔗 Link Penting

| Keterangan | URL |
|-----------|-----|
| Website Production | *(diisi setelah deploy)* |
| Form Pengaduan Masyarakat | https://forms.gle/n1FUbecTAm9goBy66 |
| Email Nagari | nagarikubangkb2011@gmail.com |

---

## 👥 Tim Pengembang

Program KKN Universitas Andalas · Nagari Kubang Koto Berapak · 2026

---

## 📄 Lisensi

Project ini dikembangkan khusus untuk Nagari Kubang Koto Berapak dan tidak dimaksudkan untuk distribusi umum.
