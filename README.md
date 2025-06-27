<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Inventory App API

Tes Seleksi Software Engineer

---

## 📦 Tech Stack

- Laravel 11
- MySQL 8
- Docker
- Laravel Sanctum (untuk autentikasi token)
- RESTful API
- Postman (untuk dokumentasi API)

---

## 🚀 Cara Install & Jalankan Project

### Jalankan dengan Docker (Direkomendasikan)

1. Clone Repository

```bash
git clone https://github.com/yourusername/inventory-app.git
cd inventory-app
```

2. Copy file `.env`

```bash
cp .env.example .env
```

3. Edit konfigurasi database di file `.env`:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=inventory_app
DB_USERNAME=inventory_user
DB_PASSWORD=secret
```

4. Build & Jalankan Docker

```bash
docker-compose up -d --build
```

5. Generate APP_KEY

```bash
docker-compose exec app php artisan key:generate
```

6. Jalankan Migrasi

```bash
docker-compose exec app php artisan migrate
```

7. Akses API

Buka browser atau Postman:

```
http://localhost:8000
```

---

### Jalankan Tanpa Docker (Opsional)

Jika tidak menggunakan Docker, jalankan langkah-langkah berikut:

1. Install dependencies:

```bash
composer install
```

2. Copy file `.env`

```bash
cp .env.example .env
```

3. Generate APP_KEY

```bash
php artisan key:generate
```

4. Edit konfigurasi database di file `.env` sesuai koneksi lokal MySQL kamu.

5. Jalankan migrasi:

```bash
php artisan migrate
```

6. Jalankan server lokal:

```bash
php artisan serve
```

---

## 🔐 Authentication

Semua endpoint API menggunakan **Bearer Token**.

Untuk mendapatkan token, lakukan login:

```
POST /api/login
```

Body:

```json
{
  "email": "user@example.com",
  "password": "password"
}
```

Response:

```json
{
  "token": "YOUR_TOKEN_HERE"
}
```

Tambahkan token ke header setiap request API:

```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

## 🛠️ API Endpoints

| Endpoint                               | Method | Keterangan                         |
|----------------------------------------|--------|------------------------------------|
| /api/login                             | POST   | Login & generate token             |
| /api/users                             | GET    | List Users                         |
| /api/users                             | POST   | Create User                        |
| /api/users/{id}                        | PUT    | Update User                        |
| /api/users/{id}                        | DELETE | Delete User                        |
| /api/produk                            | CRUD   | CRUD Produk                        |
| /api/lokasi                            | CRUD   | CRUD Lokasi                        |
| /api/mutasi                            | CRUD   | CRUD Mutasi                        |
| /api/produk/{id}/mutasi                | GET    | History Mutasi per Produk          |
| /api/users/{id}/mutasi                 | GET    | History Mutasi per User            |

Semua response dalam format JSON.

---

## 📄 Dokumentasi Postman

[👉 Klik di sini untuk Dokumentasi API Postman](https://documenter.getpostman.com/view/17855264/2sB2xFdnHY)

---

## 👨‍💻 Author

- Nama: Your Name
- Email: your.email@example.com
- LinkedIn: [Your LinkedIn Profile](https://www.linkedin.com/in/yourprofile)

