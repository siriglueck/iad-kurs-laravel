# Checkliste für .env – MariaDB-Version (Laravel Grundlagenkurs)

Diese Checkliste hilft dir, eine funktionierende `.env` für MariaDB einzurichten.

---

## 1. Allgemeines

- [ ] `APP_ENV=local`
- [ ] `APP_DEBUG=true`
- [ ] `.env` aus `.env.example` kopiert
- [ ] `php artisan key:generate` ausgeführt

---

## 2. Datenbank-Einstellungen für MariaDB

Eintragen:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelkurs
DB_USERNAME=laravel_kurs
DB_PASSWORD=geheimes-passwort
```

---

## 3. MariaDB vorbereiten

Im Terminal:

```bash
sudo mysql
```

In der MariaDB-Konsole:

```sql
CREATE DATABASE campusmanager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE librarymanager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'geheimes-passwort';
GRANT ALL PRIVILEGES ON campusmanager.* TO 'laravel_user'@'localhost';
GRANT ALL PRIVILEGES ON librarymanager.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## 4. Migrationen ausführen

Im Projektordner:

```bash
php artisan migrate
```

Erwartung: keine Fehlermeldungen → Tabellen werden erstellt.

---

## 5. Sessions, Cache, Queue

Empfohlen:

```env
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

Check:

- [ ] kein Fehler „no such table: sessions“
- [ ] kein Fehler „no such table: cache“

---

## 6. Nach `.env`-Änderungen

Immer ausführen:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 7. Minimal-Konfiguration (Kurzüberblick)

- [ ] MySQL/MariaDB eingetragen  
- [ ] User und DB existieren  
- [ ] Migrationen erfolgreich  
- [ ] Sessions/Cache auf `file`  
- [ ] Debug an  
- [ ] APP_KEY gesetzt  

Wenn diese Punkte erfüllt sind → das Projekt ist bereit für den Kurs.
