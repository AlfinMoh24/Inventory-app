# Inventory App API

Tes Seleksi Software Engineer

---

## 📦 Tech Stack

- Laravel 12
- MySQL 8
- Docker
- Laravel Sanctum (untuk autentikasi token)
- RESTful API
- Postman (untuk dokumentasi API)

---

## 🚀 Cara Install & Jalankan Project

### Jalankan dengan Docker

1. Clone Repository

```bash
git clone https://github.com/AlfinMoh24/Inventory-app.git
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
5. Install Composer

```bash
docker-compose exec app composer install --no-dev
```

5. Generate APP_KEY

```bash
docker-compose exec app php artisan key:generate
```

6. Jalankan Migrasi

```bash
docker-compose exec app php artisan migrate
```

7. Jalankan Seeder (Opsional)

```bash
docker-compose exec app php artisan db:seed
```

atau

```bash
docker-compose exec app php artisan migrate:fresh --seed
```

8. Akses API

Buka browser atau Postman:

```
http://localhost:8000
```

---

### Jalankan Tanpa Docker

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

4. Edit konfigurasi database di file `.env` sesuai koneksi lokal MySQL anda.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_app
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrasi:

```bash
php artisan migrate
```

6. Jalankan server lokal:

```bash
php artisan serve
```

6. Jalankan Seeder

```bash
php artisan db:seed
```

atau

```bash
php artisan migrate:fresh --seed
```


7. Jalankan aplikasi di:

```bash
http://127.0.0.1:8000/
```

---

## 🔐 Authentication

Semua endpoint API menggunakan **Bearer Token**.

Untuk mendapatkan token, lakukan login:

```
POST /api/auth/login
```

Body:

```json
{
  "email": "user@example.com",
  "password": "12345678"
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

# Inventory App API

Berikut adalah daftar endpoint API pada aplikasi Inventory App, **menggunakan Laravel**. Semua endpoint menggunakan autentikasi Bearer Token (kecuali login dan register).

| Endpoint                                  | Method | Keterangan                                 |
|-------------------------------------------|--------|--------------------------------------------|
| /api/auth/login                           | POST   | Login & generate token                     |
| /api/auth/logout                          | POST   | Logout user (wajib kirim bearer token)     |
| /api/auth/register                        | POST   | Register user baru                         |
| /api/user                                 | GET    | Mendapatkan data user yang sedang login    |
| /api/users                                | GET    | List semua user                            |
| /api/users                                | POST   | Create user                                |
| /api/users/{id}                           | PUT    | Update user                                |
| /api/users/{id}                           | DELETE | Delete user                                |
| /api/produk                               | GET    | List semua produk                          |
| /api/produk                               | POST   | Create produk                              |
| /api/produk/{id}                          | GET    | Detail produk                              |
| /api/produk/{id}                          | PUT    | Update produk                              |
| /api/produk/{id}                          | DELETE | Delete produk                              |
| /api/lokasi                               | GET    | List semua lokasi                          |
| /api/lokasi                               | POST   | Create lokasi                              |
| /api/lokasi/{id}                          | GET    | Detail lokasi                              |
| /api/lokasi/{id}                          | PUT    | Update lokasi                              |
| /api/lokasi/{id}                          | DELETE | Delete lokasi                              |
| /api/mutasi                               | GET    | List semua mutasi                          |
| /api/mutasi                               | POST   | Create mutasi                              |
| /api/mutasi/{id}                          | GET    | Detail mutasi                              |
| /api/mutasi/{id}                          | PUT    | Update mutasi                              |
| /api/mutasi/{id}                          | DELETE | Delete mutasi                              |


Semua response dalam format JSON.

---

## 📄 Dokumentasi Postman

[👉 Klik di sini untuk Dokumentasi API Postman](https://documenter.getpostman.com/view/17855264/2sB2xFdnHY)

---

## 👨‍💻 Author

- Nama: MOH ALFIN
- Email: alfinmoh24@gmail.com

