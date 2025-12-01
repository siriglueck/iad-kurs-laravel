# Laravel-Grundlagenkurs – Teilnehmer-Starter-Repo

Dieses Repository ist der Ausgangspunkt für den Kurs **Laravel-Grundlagen** mit dem Projekt **campusmanager**.

Es enthält:

- ein vorbereitetes Laravel-Projekt (oder einen Verweis darauf)
- diese README mit den wichtigsten Schritten
- eine einfache Git- und Artisan-Übersicht

Ziel: Du sollst möglichst schnell mit Laravel arbeiten können, ohne lange Installationshürden.

---

## Voraussetzungen

- Zugang zu einer Ubuntu-VM (wird im Kurs zur Verfügung gestellt)
- VS Code mit der Erweiterung „Remote – SSH“
- PHP und Composer sind auf der VM installiert (wird im Kurs vorbereitet)

---

## Projekt auf der VM einrichten

1. Per VS Code per SSH auf die VM verbinden.
2. Terminal öffnen und einen Ordner für Laravel-Projekte anlegen:

   ```bash
   mkdir -p ~/laravel
   cd ~/laravel
   ```

3. Dieses Starter-Repo klonen (URL bekommst du im Kurs):

   ```bash
   git clone <DEINE_REPO_URL> campusmanager
   cd campusmanager
   ```

4. Abhängigkeiten installieren:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

5. Datenbankverbindung in `.env` anpassen. Die Zugangsdaten bekommst du im Kurs, typischer Aufbau:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravelkurs
   DB_USERNAME=laravel_user
   DB_PASSWORD=LaravelKurs!2025
   ```

6. Migrationen ausführen:

   ```bash
   php artisan migrate
   ```

7. Entwicklungsserver starten:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

   Danach kannst du im Browser deines Hostsystems die Seite öffnen, zum Beispiel:

   ```text
   http://<Deine-IP-Adresse>:8000
   ```

---

## Wichtige Artisan-Befehle im Kurs

```bash
# Datenbank migrieren
php artisan migrate

# Datenbank neu aufsetzen und Seeder ausführen
php artisan migrate:fresh --seed

# Konfigurations-Cache leeren (z. B. nach Änderung von .env)
php artisan config:clear

# Entwicklungsserver starten
php artisan serve --host=0.0.0.0 --port=8000
```

---

## Optionale Git-Verwendung

Wenn du deinen Fortschritt sichern möchtest, kannst du Git verwenden:

```bash
git status
git add .
git commit -m "Stand Tag 1"
git push origin main
```

Dies ist optional und abhängig davon, ob der Kurs Git behandelt.

---

## Hilfe im Kurs

Wenn etwas nicht funktioniert:

- prüfe Fehlermeldungen im Terminal
- frage deinen Trainer nach typischen Stolpersteinen (zum Beispiel fehlende Migrationen, falsche Route, View nicht gefunden)
- gib nicht auf: Fehlersuche gehört zum Entwickleralltag dazu
