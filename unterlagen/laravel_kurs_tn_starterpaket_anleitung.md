# Laravel-Grundlagenkurs – Starterpaket für Teilnehmende

Dieses Dokument beschreibt, wie du deine Arbeitsumgebung für den Kurs vorbereitest.

Wir arbeiten mit:

- Ubuntu-Server-VM (24.04 LTS)
- VS Code mit SSH-Verbindung in die VM
- Laravel-Projekt `campusmanager`
- MariaDB als Datenbank

---

## 1. Verbindung zur VM mit VS Code

1. VS Code öffnen.
2. Erweiterung „Remote – SSH“ installieren (falls noch nicht vorhanden).
3. Über das grüne Icon unten links **„Connect to Host…“** wählen.
4. Die Zugangsdaten aus dem Kurs verwenden (Host, Benutzername).
5. Wenn die Verbindung steht, siehst du das Dateisystem der VM im Explorer.

---

## 2. Projektordner anlegen

Im VS-Code-Terminal (auf der VM):

```bash
mkdir -p ~/laravel
cd ~/laravel
```


---

## 3. Abhängigkeiten installieren

Im Projektordner:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

---

## 4. Datenbank vorbereiten

Dein Trainer stellt dir Anleitungen/Skripte zur Verfügung, z. B.:

- `mariadb_installation_ubuntu_vm.md`
- `setup_mariadb.sh.md`

Typische Einstellungen in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelkurs
DB_USERNAME=laravel_kurs
DB_PASSWORD=LaraKurs!2025
```

Danach:

```bash
php artisan migrate
```

---

## 5. Dev-Server starten

Im Projektordner:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Im Browser deines Hostsystems:

- `http://trainer.local:8000` oder
- `http://<IP_der_VM>:8000`

(Adresse bekommst du im Kurs.)

---

## 6. Häufige Befehle im Kurs

```bash
# Alle Migrationen ausführen
php artisan migrate

# Datenbank leeren und neu aufsetzen (nur im Kurs!)
php artisan migrate:fresh --seed

# Cache zurücksetzen, wenn .env geändert wurde
php artisan config:clear
```

---

Wenn du dich an diese Schritte hältst, bist du für alle Übungen von Tag 1 bis Tag 5 gut vorbereitet.
