# TN-Startanleitung Tag 1 – Laravel & GitHub Setup

## 1. GitHub-Repository anlegen

1. Auf GitHub anmelden.
2. Neues Repository erstellen, z. B.:  
   `laravel-grundlagenkurs-kursverlauf-YYYY-MM`
3. Repository-URL kopieren.

## 2. Projektordner anlegen

```bash
mkdir -p ~/laravel
cd ~/laravel
```

## 3. Laravel installieren

```bash
composer create-project laravel/laravel campusmanager
cd campusmanager
```

## 4. Git einrichten

```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/<DEINUSERNAME>/laravel-grundlagenkurs-kursverlauf-YYYY-MM.git
git push -u origin main
```

## 5. .env einrichten

```bash
cp .env.example .env
php artisan key:generate
```

DB-Daten eingeben:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelkurs
DB_USERNAME=laravel_user
DB_PASSWORD=LaravelKurs!2025
```

Migrationen:

```bash
php artisan migrate
```

## 6. Server starten

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Aufrufen im Browser:  
`http://<DEINE_IP>:8000`
