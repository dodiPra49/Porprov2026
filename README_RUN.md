# 🚀 Panduan Menjalankan Sistem PORPROV SUMBAR 2026

Dokumentasi ini menjelaskan cara menjalankan seluruh stack aplikasi **PORPROV Sumatera Barat 2026** baik menggunakan Docker Compose maupun secara lokal (independen).

---

## 🏗️ Alokasi Port Layanan (Bebas Konflik)

Port telah disesuaikan agar tidak bentrok dengan container lain atau web server lokal yang aktif:

| Layanan | Nama Container | Port Host | Port Internal | Keterangan |
| :--- | :--- | :--- | :--- | :--- |
| **Gateway Proxy** | `porprov_proxy` | **`8090`** | `80` | Reverse proxy rute utama (`/`, `/admin`, `/api`) |
| **Portal Publik** | `porprov_frontend` | **`3000`** | `3000` | Next.js 14 App Router |
| **Admin Panel** | `porprov_admin` | **`8002`** | `8000` | Laravel 11 Blade Admin Panel |
| **REST API Engine** | `porprov_api` | **`5000`** | `5000` | Express.js REST API + JWT |
| **Database** | `porprov_db` | **`3308`** | `3306` | MySQL 8.0 terpusat |
| **phpMyAdmin GUI** | `porprov_phpmyadmin` | **`8085`** | `80` | Web GUI Database MySQL |

---

## 🐳 Opsi 1: Menjalankan dengan Docker Compose (Rekomendasi)

Jalankan perintah berikut di folder utama:

```bash
docker compose up -d
```

### URL Akses Setelah Berjalan:
- **Melalui Nginx Gateway Utama (Port 8090):**
  - **Portal Publik (Next.js):** [http://localhost:8090](http://localhost:8090)
  - **Admin Panel (Laravel Blade):** [http://localhost:8090/admin](http://localhost:8090/admin)
  - **REST API (Express.js):** [http://localhost:8090/api/v1/medals](http://localhost:8090/api/v1/medals)
- **Melalui Port Langsung:**
  - phpMyAdmin: [http://localhost:8085](http://localhost:8085)
  - Portal Next.js: [http://localhost:3000](http://localhost:3000)
  - Admin Laravel: [http://localhost:8002/admin](http://localhost:8002/admin)
  - Express API: [http://localhost:5000/health](http://localhost:5000/health)
  - Database MySQL: `localhost:3308` (User: `root`, Password: `rootpassword`)

---

## 💻 Opsi 2: Menjalankan Secara Lokal (Development Mode)

Buka 3 terminal terpisah:

### Terminal 1: Admin Panel (Laravel 11)
```bash
php artisan serve --port=8000
```
Akses di browser: [http://localhost:8000/admin](http://localhost:8000/admin)

### Terminal 2: REST API (Express.js + JWT)
```bash
cd api
npm start
```
Akses di browser: [http://localhost:5000/health](http://localhost:5000/health)

### Terminal 3: Public Portal (Next.js)
```bash
cd frontend
npm run dev
```
Akses di browser: [http://localhost:3000](http://localhost:3000)

---

## 🔐 Kredensial & Autentikasi JWT

### Akun Superadmin:
- **Email:** `superadmin@porprov2026.sumbarprov.go.id`
- **Password:** `PorprovSumbar2026!`
