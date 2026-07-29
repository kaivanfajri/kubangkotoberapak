# Handoff: Pengembangan Fitur Portal Nagari Kubang Koto Berapak

**Tanggal:** 29 Juli 2026
**Commit Branch:** `main`
**Tech Stack:** Laravel 12 + Vite + MySQL + Blade

---

## A. Ringkasan Pekerjaan Yang Sudah Selesai

### 1. Database — 7 Tabel Baru ✅

Seluruh tabel baru telah dibuat dan berhasil dimigrasi (batch 2).

| Tabel | Kolom Utama | Fungsi |
|-------|------------|--------|
| `beritas` | judul, slug, kategori, konten, gambar, tanggal_terbit, status | Berita & kegiatan nagari |
| `umkms` | nama_usaha, pemilik, kategori, alamat, nomor_wa, deskripsi, foto, produk_utama (JSON) | Katalog UMKM |
| `kelompok_tanis` | nama_kelompok, ketua, jorong, jumlah_anggota, luas_lahan, komoditas_utama, produktivitas, status | Data kelompok tani |
| `galeris` | caption, kategori, gambar | Galeri foto dokumentasi |
| `strukturs` | nama, jabatan, kategori, foto, urutan | Struktur organisasi nagari |
| `lembagas` | nama_lembaga, ketua, jumlah_anggota, nomor_hp, deskripsi, logo | Lembaga nagari |
| `settings` | key (unique), value | Pengaturan umum website |

> **File migration:** `database/migrations/2026_07_28_110000_create_nagari_tables.php`

### 2. Models — 7 Model Baru ✅

Semua model sudah dibuat di `app/Models/`:
- `Berita.php` — auto-generate slug, scope `terbit()`
- `Umkm.php` — JSON cast `produk_utama`
- `KelompokTani.php`
- `Galeri.php`
- `Struktur.php` — scopes: `pemerintah()`, `bamus()`, `lpmn()`
- `Lembaga.php`
- `Setting.php` — static helpers `getValue()` / `setValue()`

### 3. Controllers Admin CRUD — 4 Baru ✅

| Controller | Operasi | Upload |
|-----------|---------|--------|
| `BeritaController.php` | index, create, store, edit, update, destroy | ✅ Gambar sampul → `storage/berita/` |
| `UmkmController.php` | index, create, store, edit, update, destroy | ✅ Foto produk → `storage/umkm/` |
| `KelompokTaniController.php` | index, create, store, edit, update, destroy | — |
| `GaleriController.php` | index, create, store, destroy | ✅ Foto galeri → `storage/galeri/` |

### 4. Admin Views — 11 View Baru ✅

- `admin/berita/` — index, create, edit
- `admin/umkm/` — index, create, edit
- `admin/kelompok-tani/` — index, create, edit
- `admin/galeri/` — index, create

### 5. Routes — Diperbarui ✅

File `routes/web.php` sudah ditambahkan:
- `Route::resource('berita', BeritaController::class)`
- `Route::resource('umkm', UmkmController::class)`
- `Route::resource('kelompok-tani', KelompokTaniController::class)`
- `Route::resource('galeri', GaleriController::class)` (hanya index, create, store, destroy)
- Route publik: `GET /berita` dan `GET /berita/{slug}`

### 6. Public Views — 2 Baru + 3 Diperbarui ✅

| View | Status |
|------|--------|
| `berita.blade.php` | **BARU** — listing berita publik |
| `berita-detail.blade.php` | **BARU** — detail artikel |
| `umkm.blade.php` | Diperbarui — data dari DB, fallback ke data statis |
| `galeri.blade.php` | Diperbarui — data dari DB, fallback ke data statis |
| `pertanian.blade.php` | Diperbarui — data kelompok tani dari DB, fallback ke data statis |

### 7. Layout & Dashboard ✅

- **Sidebar admin** (`layouts/app.blade.php`) — semua link mengarah ke route yang benar
- **Dashboard** — stat cards dinamis (count dari DB) + aksi cepat link yang benar
- **Navbar publik** (`layouts/nagari.blade.php`) — ditambah link "Berita"

---

## B. Yang BELUM Selesai (Perlu Dilanjutkan)

Berdasarkan dokumen PRD (`PRD_V1.md`), berikut hal-hal yang **belum dikerjakan**:

### 1. ⚠️ Migrasi Struktur & Lembaga dari JSON ke Database (Fitur 5 PRD)

**Status:** Belum dikerjakan.

**Kondisi saat ini:**
- Data Struktur Nagari disimpan di `storage/struktur.json` (file JSON)
- Data Lembaga Nagari disimpan di `storage/lembaga.json` (file JSON)
- Controller `StrukturLembagaController.php` masih baca/tulis ke file JSON
- Tabel database `strukturs` dan `lembagas` **sudah dibuat** tapi **belum digunakan**

**Yang perlu dilakukan:**
1. Update `StrukturLembagaController.php` → ganti dari `Storage::get/put JSON` ke `Struktur::` dan `Lembaga::` Eloquent model
2. Buat migration data (seeder) untuk memindahkan data dari JSON ke tabel DB
3. Update halaman publik `struktur.blade.php` dan `lembaga.blade.php` agar membaca dari DB
4. Update `routes/web.php` route `/struktur` dan `/lembaga` untuk menggunakan DB

### 2. ⚠️ Seeder Data Awal

**Status:** Belum dibuat.

Data UMKM, Galeri, dan Kelompok Tani yang sebelumnya hardcode di JavaScript belum di-seed ke database. Saat ini halaman publik menggunakan **fallback pattern** — data statis tampil selama DB kosong.

**Yang perlu dilakukan:**
- Buat file `database/seeders/UmkmSeeder.php` — masukkan 4 data UMKM yang ada di JS lama
- Buat file `database/seeders/GaleriSeeder.php` — masukkan 14 foto galeri yang ada di JS lama
- Buat file `database/seeders/KelompokTaniSeeder.php` — masukkan 7 kelompok tani
- Jalankan `php artisan db:seed`

### 3. ⚠️ Testing & Polish

- Belum ada automated test
- Validasi upload gambar di production perlu dicek (file permission)
- Pagination styling mungkin perlu disesuaikan dengan tema admin

---

## C. Struktur File Yang Ditambahkan

```
app/
├── Http/Controllers/Admin/
│   ├── BeritaController.php          ← BARU
│   ├── GaleriController.php          ← BARU
│   ├── KelompokTaniController.php    ← BARU
│   └── UmkmController.php           ← BARU
├── Models/
│   ├── Berita.php                    ← BARU
│   ├── Galeri.php                    ← BARU
│   ├── KelompokTani.php             ← BARU
│   ├── Lembaga.php                  ← BARU
│   ├── Setting.php                  ← BARU
│   ├── Struktur.php                 ← BARU
│   └── Umkm.php                     ← BARU

database/migrations/
│   └── 2026_07_28_110000_create_nagari_tables.php  ← BARU (7 tabel)

resources/views/
├── admin/
│   ├── berita/    (index, create, edit)       ← BARU
│   ├── galeri/    (index, create)             ← BARU
│   ├── kelompok-tani/ (index, create, edit)   ← BARU
│   └── umkm/     (index, create, edit)        ← BARU
├── berita.blade.php                           ← BARU
├── berita-detail.blade.php                    ← BARU
├── dashboard.blade.php                        ← DIPERBARUI
├── galeri.blade.php                           ← DIPERBARUI
├── pertanian.blade.php                        ← DIPERBARUI
├── umkm.blade.php                             ← DIPERBARUI
├── layouts/app.blade.php                      ← DIPERBARUI
└── layouts/nagari.blade.php                   ← DIPERBARUI

routes/web.php                                 ← DIPERBARUI
PRD_V1.md                                      ← BARU (dokumen PRD)
```

---

## D. Catatan Penting Untuk Developer Selanjutnya

1. **Fallback Pattern:** Halaman publik UMKM, Galeri, dan Pertanian menggunakan pola fallback — jika tabel DB kosong, data statis lama tetap tampil. Begitu ada data di DB, data statis otomatis tergantikan.

2. **Upload Gambar:** Semua upload gambar disimpan ke `storage/app/public/` via `store('folder', 'public')`. Symlink `public/storage` sudah dibuat.

3. **Route Naming:** Semua route admin menggunakan prefix `admin.` — contoh: `admin.berita.index`, `admin.umkm.create`, dll.

4. **Tabel `strukturs` & `lembagas`:** Sudah dibuat tapi belum digunakan oleh controller. Controller masih pakai JSON file. Ini prioritas selanjutnya.

5. **Tabel `settings`:** Sudah dibuat untuk menyimpan pengaturan umum (slogan, visi, misi, dll) tapi belum ada UI adminnya.
