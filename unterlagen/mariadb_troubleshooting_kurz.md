# MariaDB – kurze Troubleshooting-Liste

Ein paar typische Fehler und schnelle Lösungen für den Kurs.

---

## 1. „Access denied for user…“

**Fehlermeldung (Beispiel):**

```text
SQLSTATE[HY000] [1045] Access denied for user 'laravel_kurs'@'localhost' (using password: YES)
```

**Checkliste:**

1. Stimmt das Passwort in `.env`?

   ```env
   DB_USERNAME=laravel_kurs
   DB_PASSWORD=LaraKurs!2025
   ```

2. Cache leeren:

   ```bash
   php artisan config:clear
   ```

3. Benutzerrechte prüfen (als Root):

   ```bash
   sudo mysql
   ```

   ```sql
   SHOW GRANTS FOR 'laravel_kurs'@'localhost';
   ```

   Falls nötig, Rechte neu vergeben:

   ```sql
   GRANT ALL PRIVILEGES ON laravelkurs.* TO 'laravel_kurs'@'localhost';
   FLUSH PRIVILEGES;
   ```

---

## 2. „Unknown database 'laravelkurs'“

**Fehlermeldung:**

```text
SQLSTATE[HY000] [1049] Unknown database 'laravelkurs'
```

**Lösung:**

1. In MariaDB prüfen, ob die DB existiert:

   ```bash
   mysql -u laravel_kurs -p
   ```

   ```sql
   SHOW DATABASES;
   ```

2. Falls die Datenbank fehlt, neu anlegen (als Root):

   ```bash
   sudo mysql
   ```

   ```sql
   CREATE DATABASE laravelkurs
     CHARACTER SET utf8mb4
     COLLATE utf8mb4_unicode_ci;
   ```

3. Danach im Projekt:

   ```bash
   php artisan migrate
   ```

---

## 3. MariaDB-Dienst läuft nicht

**Symptome:**

* Verbindungsfehler
* `Can't connect to local MySQL server through socket...`

**Prüfen:**

```bash
systemctl status mariadb
```

**Starten und aktivieren:**

```bash
sudo systemctl start mariadb
sudo systemctl enable mariadb
```

Wenn der Dienst nicht startet, hilft oft ein Blick ins Journal:

```bash
journalctl -u mariadb --no-pager | tail -n 50
```

---

## 4. Root-Zugang funktioniert nicht

**Problem:**

* `mysql -u root -p` funktioniert nicht
* oder Passwort unbekannt

**Workaround auf der Kurs-VM:**

Versuch:

```bash
sudo mysql
```

Wenn das klappt, bist Du wieder drin und kannst notfalls ein neues Root‑Passwort setzen oder Kurs‑Benutzer und Datenbanken neu anlegen oder, falls es am Passwort liegt, das Passwort neu setzen.

Passwort neu setzen:

```sql
ALTER USER 'laravel_user'@'localhost' IDENTIFIED BY 'NEUES_PASSWORT';
FLUSH PRIVILEGES;
```

Beenden:

```sql
EXIT;
```

Solltest Du bei der Anlage des Kurs-Benutzers einen Tippfehler gemacht haben, kannst Du Dir die Datenbank-Nutzer mit folgendem Befehl anzeigen lassen:

Falls Du den DB-Server bereits beendet hast in einem Rutsch:

```bash
sudo mysql -u root -e "SELECT User, Host FROM mysql.user;"
```

oder interaktiv im DB-Server mit dem Root-User anmelden und:

```sql
SELECT User, Host FROM mysql.user;
```

Ergebnis sieht z. B. so aus:

```bash
+----------------+-----------+
| User           | Host      |
+----------------+-----------+
| root           | localhost |
| laravel_user   | localhost |
| mariadb.sys    | localhost |
| ...            | ...       |
+----------------+-----------+
```

Hier bekommst du die wichtigsten Befehle zum Umbenennen, Löschen und Neu-Anlegen von MariaDB/MySQL-Usern in der Ubuntu-VM

### ✅ 1. Benutzer umbenennen (`RENAME USER`)

Sytax:

```sql
RENAME USER 'altername'@'localhost' TO 'neuername'@'localhost';
FLUSH PRIVILEGES;
```

In der Shell:

```bash
sudo mysql -u root -e "RENAME USER 'altername'@'localhost' TO 'neuername'@'localhost'; FLUSH PRIVILEGES;"
```

👉 Wichtig:
User + Host gehören immer zusammen.
`'laravel_user'@'localhost' ≠ 'laravel_user'@'%'`.

### ✅ 2. Benutzer löschen (`DROP USER`)

Wenn der User falsch angelegt wurde (z. B. falscher Name oder Host), zuerst löschen:

```sql
DROP USER 'laravel_user'@'localhost'; FLUSH PRIVILEGES;
```

oder, wenn du nicht weißt, mit welchem Host er angelegt wurde:

```sql
RENAME USER 'DROP USER 'laravel_user'@'%'; FLUSH PRIVILEGES;
```

### ✅ 3. Benutzer neu anlegen

Standard für Laravel auf der VM:

```sql
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'DEIN_PASSWORT';
GRANT ALL PRIVILEGES ON laravelkurs.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
```

Wenn du bewusst willst, dass der User sich von überall verbinden kann:

```sql
CREATE USER 'laravel_user'@'%' IDENTIFIED BY 'DEIN_PASSWORT';
GRANT ALL PRIVILEGES ON laravelkurs.* TO 'laravel_user'@'%';
FLUSH PRIVILEGES;
```

### ✅ 4. Prüfen, ob User korrekt eingetragen ist

```sql
SELECT User, Host FROM mysql.user;
```

### 🔧 Möglichkeit: Benutzer vollständig überschreiben

Wenn du sicher gehen willst, dass der User fehlerfrei ist:

```sql
DROP USER IF EXISTS 'laravel_user'@'localhost';
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'DEIN_PASSWORT';
GRANT ALL PRIVILEGES ON laravelkurs.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
```

---

## 5. Laravel-Migrationen schlagen fehl

**Typische Meldungen:**

* Tabelle existiert schon
* Spalte existiert nicht
* falscher SQL‑Typ

**Erstmal:**

```bash
php artisan migrate:status
```

Um komplett neu zu starten (nur im Kurs, nicht auf echten Systemen!):

```bash
php artisan migrate:fresh
```

Achtung: Dadurch werden alle Tabellen in der Datenbank gelöscht und neu angelegt.

---

## 6. Port- oder Verbindungsprobleme (eher selten im Kurs)

Wenn Du MariaDB nur lokal auf der VM verwendest (Laravel und DB laufen auf derselben VM), brauchst Du normalerweise keine spezielle Firewall‑Konfiguration.

Falls doch Probleme auftreten:

1. Host in `.env` sollte `127.0.0.1` sein, nicht `localhost`:

   ```env
   DB_HOST=127.0.0.1
   ```

2. Port prüfen (Standard 3306):

   ```env
   DB_PORT=3306
   ```

3. Testen, ob MariaDB auf Port 3306 lauscht:

   ```bash
   sudo ss -tulpen | grep 3306
   ```

---

Wenn Du mit dieser Liste nicht weiterkommst:  
*Fehlermeldung kopieren und im Kurs / bei der Trainerin / beim Trainer nachfragen.*
