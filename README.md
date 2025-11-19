# Digital Library App

Aplikasi Perpustakaan Digital berbasis web dengan Laravel untuk tugas praktikum SMK.

## 🚀 Fitur
- ✅ Authentication dengan 3 role (Admin, Petugas, Peminjam)
- ✅ Manajemen Buku (CRUD lengkap)
- ✅ Sistem Peminjaman
- ✅ Laporan
- ✅ Role-Based Access Control
- ✅ Responsive Design

## 👥 User Roles & Permissions

| Role | Dashboard | Manajemen Buku | Peminjaman | Laporan |
|------|-----------|----------------|------------|---------|
| Admin | ✅ | ✅ | ❌ | ✅ |
| Petugas | ✅ | ✅ | ❌ | ✅ |
| Peminjam | ✅ | ❌ | ✅ | ❌ |

## 👤 Akun Testing
- **Admin:** admin@library.com / password123
- **Petugas:** petugas@library.com / password123  
- **Peminjam:** register via form atau peminjam1@library.com / password123

## 🛠️ Teknologi
- **Backend:** Laravel 10
- **Frontend:** Bootstrap 5, Blade Templating
- **Database:** MySQL
- **Authentication:** Laravel Auth

## 📦 Instalasi
```bash
# Clone repository
git clone https://github.com/fadhilna/digital-library-app.git
cd digital-library-app

# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database di file .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306  
# DB_DATABASE=digital_library
# DB_USERNAME=root
# DB_PASSWORD=

# Jalankan migration
php artisan migrate

# Jalankan aplikasi
php artisan serve
