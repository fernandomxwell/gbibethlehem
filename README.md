# GBI Bethlehem

Website resmi **Gereja Baptis Indonesia Bethlehem** — menampilkan jadwal ibadah, informasi kegiatan, kontak, dan lokasi gereja.

---

## Tech Stack

- **Backend:** Laravel 13 (PHP 8.3+)
- **Frontend:** Blade, Tailwind CSS v4, Vite
- **Database:** SQLite (development) / MySQL atau PostgreSQL (production)
- **Timezone/Locale:** Asia/Jakarta / Indonesian (`id`)

## Instalasi

```bash
composer setup
```

Perintah ini akan: install dependensi Composer & npm, buat file `.env`, generate app key, jalankan migrasi, dan build aset frontend.

### Manual (jika diperlukan)

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build
```

## Development

```bash
composer dev
```

Menjalankan secara bersamaan: Laravel server, queue listener, Pail log viewer, dan Vite dev server.

## Perintah Umum

```bash
# Jalankan semua test
composer test

# Jalankan satu file atau method test
php artisan test tests/Feature/ExampleTest.php
php artisan test --filter=nama_method

# Lint kode PHP
./vendor/bin/pint
```

## Konfigurasi Gereja

Nilai-nilai seperti alamat, nomor telepon, email, link media sosial, dan menu navigasi dikelola di satu tempat:

```
config/church.php
```

Untuk mengubah informasi kontak atau menambah/menghapus menu, cukup edit file tersebut tanpa perlu menyentuh view.

## Struktur View

```
resources/views/
├── layouts/
│   └── app.blade.php          # Layout utama (head, navbar, footer, JS global)
├── partials/
│   ├── navbar.blade.php
│   └── footer.blade.php
└── landing/
    ├── index.blade.php        # Halaman utama
    └── sections/
        ├── hero.blade.php
        ├── ibadah.blade.php
        ├── kontak.blade.php
        └── lokasi.blade.php
```

Untuk membuat halaman baru:

```blade
@extends('layouts.app')

@section('title', 'Judul Halaman')

@section('content')
    {{-- konten --}}
@endsection
```
