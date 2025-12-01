# MariaDB auf der Ubuntu-VM installieren

In dieser Anleitung installierst Du MariaDB auf Deiner Kurs‑VM und richtest sie für den Laravel‑Kurs ein.

> **Voraussetzungen:**  
> * Du bist auf der VM eingeloggt  
> * Du arbeitest im Terminal  
> * Du hast `sudo`‑Rechte

---

## 1. System aktualisieren

```bash
sudo apt update
sudo apt upgrade -y
```

---

## 2. MariaDB installieren

```bash
sudo apt install -y mariadb-server
```

Prüfen, ob der Dienst läuft:

```bash
systemctl status mariadb
```

Wenn dort `active (running)` angezeigt wird, ist alles gut.  
Zum Beenden der Statusanzeige `q` drücken.

Falls der Dienst nicht läuft, kannst Du ihn starten und beim Booten automatisch aktivieren:

```bash
sudo systemctl enable --now mariadb
```

---

## 3. Grundsicherung mit `mysql_secure_installation`

MariaDB bringt ein kleines Sicherheits‑Tool mit. Starte es so:

```bash
sudo mysql_secure_installation
```

Typische Antworten (für den Kurs völlig ausreichend):

1. **Switch to unix_socket authentication [Y/n]**  
   → `Y` (Enter)

2. **Change the root password? [Y/n]**  
   → `Y` (wenn Du ein Root‑Passwort setzen möchtest)  
   → Dann ein sicheres Passwort eingeben (zweimal).

3. **Remove anonymous users? [Y/n]**  
   → `Y`

4. **Disallow root login remotely? [Y/n]**  
   → `Y`

5. **Remove test database and access to it? [Y/n]**  
   → `Y`

6. **Reload privilege tables now? [Y/n]**  
   → `Y`

Damit ist die Basis‑Sicherung erledigt.

---

## 4. Anmeldung an MariaDB testen

### Variante A: Mit `sudo mysql` (empfohlen)

Auf vielen Ubuntu‑Systemen meldest Du Dich als Root so an:

```bash
sudo mysql
```

Wenn die MariaDB‑Konsole (`MariaDB [(none)]>`) erscheint, hat es geklappt.  
Mit folgendem Befehl verlässt Du die Konsole wieder:

```sql
EXIT;
```

### Variante B: Mit Passwort

Wenn Du ein Root‑Passwort gesetzt hast, kannst Du Dich auch so anmelden:

```bash
mysql -u root -p
```

Dann wirst Du nach dem Passwort gefragt.

---

## 5. Kurs‑Datenbank und Benutzer manuell anlegen (optional)

Für den Kurs benutzen wir standardmäßig:

* Datenbank: `laravelkurs`
* Benutzer: `laravel_kurs`
* Passwort: `LaraKurs!2025` *(nur für den Kurs, nicht in echten Projekten!)*

Melde Dich an der Datenbank an:

```bash
sudo mysql
```

Lege Datenbank und Benutzer an:

```sql
CREATE DATABASE IF NOT EXISTS laravelkurs
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'laravel_kurs'@'localhost'
  IDENTIFIED BY 'LaraKurs!2025';

GRANT ALL PRIVILEGES ON laravelkurs.*
  TO 'laravel_kurs'@'localhost';

FLUSH PRIVILEGES;
```

Danach mit `EXIT;` die Konsole verlassen.

---

## 6. Test mit dem Kurs‑Benutzer

```bash
mysql -u laravel_kurs -p
```

Passwort eingeben: `LaraKurs!2025`

Dann prüfen, ob die Datenbank `laravelkurs` sichtbar ist:

```sql
SHOW DATABASES;
USE laravelkurs;
SHOW TABLES;
EXIT;
```

Wenn das alles funktioniert, ist MariaDB für den Kurs bereit.

---

## 7. Beispiel für `.env` in einem Laravel‑Projekt

In Deinen Laravel‑Projekten (`campusmanager`, `librarymanager` usw.) kannst Du folgende Einstellungen verwenden:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelkurs
DB_USERNAME=laravel_kurs
DB_PASSWORD=LaraKurs!2025
```

Danach im Projektordner:

```bash
php artisan config:clear
```

Jetzt sind Laravel und MariaDB miteinander verbunden.
