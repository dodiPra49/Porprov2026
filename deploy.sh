#!/bin/bash

# ========================================================
# Script Deployment Otomatis PORPROV SUMBAR 2026
# ========================================================

set -e

echo "========================================================"
echo "🕒 [$(date '+%Y-%m-%d %H:%M:%S')] Memulai proses deploy..."
echo "========================================================"

# 1. Validasi file environment (.env)
if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        echo "⚠️  File .env tidak ditemukan! Membuat dari .env.example..."
        cp .env.example .env
        echo "ℹ️  Pastikan konfigurasi production pada .env sudah disesuaikan."
    fi
fi

# 2. Periksa apakah sistem menggunakan Docker Compose
if command -v docker &> /dev/null && [ -f docker-compose.yml ]; then
    echo "🐳 Menggunakan Docker Compose Deployment..."

    # Rebuild & restart container
    echo "📦 Rebuilding dan menjalankan container..."
    docker compose up -d --build --remove-orphans

    # Tunggu beberapa detik agar container database dan service siap
    echo "⏳ Menunggu container siap..."
    sleep 5

    # Jalankan migrasi dan optimasi cache di container Laravel
    echo "⚡ Menjalankan migrasi & cache Laravel di container porprov_admin..."
    docker compose exec -T porprov_admin php artisan optimize:clear || true
    docker compose exec -T porprov_admin php artisan config:cache || true
    docker compose exec -T porprov_admin php artisan route:cache || true
    docker compose exec -T porprov_admin php artisan view:cache || true
    docker compose exec -T porprov_admin php artisan migrate --force || true

    # Bersihkan image docker yang sudah tidak terpakai (dangling images)
    echo "🧹 Membersihkan image lama yang tidak terpakai..."
    docker image prune -f

else
    echo "🖥️  Menggunakan Native Linux Deployment (Tanpa Docker)..."

    # Dependensi Laravel (PHP)
    if command -v composer &> /dev/null; then
        echo "📦 Menginstall dependensi Composer (PHP)..."
        composer install --no-dev --optimize-autoloader --no-interaction
    fi

    # Optimasi & migrasi database Laravel
    if command -v php &> /dev/null; then
        echo "⚡ Optimasi konfigurasi & migrasi database Laravel..."
        php artisan optimize:clear
        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
        php artisan migrate --force
    fi

    # Dependensi & Build Express.js API (jika ada folder api)
    if [ -d "api" ] && command -v npm &> /dev/null; then
        echo "📦 Mengupdate dependensi API Express.js..."
        cd api
        npm install --omit=dev
        cd ..
    fi

    # Dependensi & Build Next.js Frontend (jika ada folder frontend)
    if [ -d "frontend" ] && command -v npm &> /dev/null; then
        echo "📦 Mengupdate & build frontend Next.js..."
        cd frontend
        npm install
        npm run build
        cd ..
    fi

    # Restart Process Manager (PM2 / Supervisor / Nginx / Apache jika terpasang)
    if command -v pm2 &> /dev/null; then
        echo "🔄 Merestart proses PM2..."
        pm2 reload all || pm2 restart all || true
    fi
    if command -v systemctl &> /dev/null; then
        echo "🔄 Merestart php-fpm & web server jika ada..."
        sudo systemctl reload nginx 2>/dev/null || true
    fi
fi

echo "========================================================"
echo "✅ [$(date '+%Y-%m-%d %H:%M:%S')] Deploy Berhasil!"
echo "========================================================"
