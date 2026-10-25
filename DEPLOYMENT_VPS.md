# 🚀 Panduan Konfigurasi Auto Deploy GitHub ke VPS Linux (CI/CD)

Panduan ini menjelaskan langkah demi langkah cara mengaktifkan **CI/CD otomatis**: setiap kali Anda melakukan `git push origin main`, GitHub Actions akan otomatis terhubung ke VPS Linux Anda via SSH dan memperbarui aplikasi (Docker Compose atau Native).

---

## 📋 Ringkasan Alur Kerja
```
Local (git push) ➡️ GitHub Repository (Actions) ➡️ SSH ke VPS Linux ➡️ git pull & ./deploy.sh ➡️ Aplikasi Terupdate!
```

---

## 🛠️ Langkah 1: Persiapan di VPS Linux

### 1. Buat / Siapkan Direktori Project di VPS
Login ke VPS Anda via SSH terminal:
```bash
ssh user@IP_VPS_ANDA
```
Masuk atau clone repository Anda di folder yang diinginkan (contoh: `/var/www/porprov-2026`):
```bash
# Pastikan git & docker sudah terpasang
sudo mkdir -p /var/www/porprov-2026
cd /var/www/porprov-2026

# Clone repo jika belum pernah:
git clone https://github.com/dodiPra49/Porprov2026.git .

# Siapkan file .env di VPS
cp .env.example .env
nano .env  # sesuaikan konfigurasi production & DB password
```

---

## 🔑 Langkah 2: Buat SSH Key untuk GitHub Actions

Agar GitHub Actions bisa masuk ke VPS tanpa mengetik password secara manual:

### 1. Generate SSH Key Pair (bisa dilakukan di VPS atau komputer lokal):
Jalankan di terminal VPS:
```bash
ssh-keygen -t ed25519 -C "github-actions-deploy" -f ~/.ssh/github_actions
```
*(Tekan **Enter** terus saat diminta passphrase agar tidak memerlukan input saat deploy otomatis).*

Perintah di atas akan menghasilkan 2 file:
- `~/.ssh/github_actions` (Private Key — **RAHASIA**)
- `~/.ssh/github_actions.pub` (Public Key)

### 2. Daftarkan Public Key ke `authorized_keys` di VPS:
```bash
cat ~/.ssh/github_actions.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
chmod 700 ~/.ssh
```

### 3. Tampilkan isi Private Key untuk dicopy ke GitHub:
```bash
cat ~/.ssh/github_actions
```
👉 **Copy seluruh teks** yang muncul (termasuk baris `-----BEGIN OPENSSH PRIVATE KEY-----` dan `-----END OPENSSH PRIVATE KEY-----`).

---

## 🔒 Langkah 3: Konfigurasi GitHub Repository Secrets

1. Buka repository Anda di browser: [https://github.com/dodiPra49/Porprov2026](https://github.com/dodiPra49/Porprov2026)
2. Klik tab **Settings** ➡️ di menu sebelah kiri pilih **Secrets and variables** ➡️ klik **Actions**.
3. Klik tombol hijau **New repository secret**, tambahkan variabel berikut satu per satu:

| Nama Secret | Deskripsi / Nilai Contoh |
| :--- | :--- |
| `VPS_HOST` | IP Publik VPS Anda (contoh: `103.180.xxx.xxx` atau domain) |
| `VPS_USERNAME` | Username login SSH (contoh: `root` atau `ubuntu`) |
| `VPS_SSH_KEY` | Paste seluruh isi dari `~/.ssh/github_actions` (Private Key) |
| `VPS_PORT` | Port SSH VPS (biasanya `22`, atau port custom jika diubah) |
| `VPS_TARGET_DIR` | Path folder project di VPS (contoh: `/var/www/porprov-2026`) |
| `VPS_PASSPHRASE` | *(Opsional)* Kosongkan jika saat `ssh-keygen` tidak pakai passphrase |

---

## 📁 Langkah 4: File Konfigurasi yang Tersedia

1. **Workflow GitHub Actions:** [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml)
   - Trigger otomatis saat push ke branch `main`.
   - Menggunakan action resmi `appleboy/ssh-action`.
   - Menjalankan `git fetch`, `git reset --hard origin/main`, dan mengeksekusi `./deploy.sh`.

2. **Script Deployment di Server:** [`deploy.sh`](deploy.sh)
   - Otomatis mendeteksi Docker Compose.
   - Rebuild dan jalankan container (`docker compose up -d --build`).
   - Eksekusi migrasi & optimasi cache Laravel (`php artisan migrate`, `php artisan optimize:clear`, dsb).
   - Membersihkan docker image lama yang tidak terpakai (`docker image prune -f`).

---

## 🚀 Langkah 5: Uji Coba Deployment

1. Commit dan push konfigurasi baru ini ke GitHub:
   ```bash
   git add .
   git commit -m "feat: setup auto deploy github actions ke VPS"
   git push origin main
   ```
2. Buka tab **Actions** di GitHub repository Anda:
   - Anda akan melihat workflow **Deploy to VPS Linux** berjalan secara otomatis.
   - Klik workflow tersebut untuk melihat live log proses deployment di VPS.
