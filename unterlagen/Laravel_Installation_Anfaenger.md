# Schritt-für-Schritt Anleitung: Laravel installieren (für Anfänger)

Diese Anleitung ist extra langsam und leicht erklärt – perfekt, wenn du zum ersten Mal mit Laravel arbeitest.

---

# 🟦 1. In den richtigen Ordner gehen

Du hast zwei Projekte:

- **campusmanager** → Beispiel vom Trainer  
- **librarymanager** → dein eigenes Übungsprojekt  

Wechsle in einen dieser Ordner:

```bash
cd ~/laravel-grundlagen-kurs/campusmanager
```

oder:

```bash
cd ~/laravel-grundlagen-kurs/librarymanager
```

Wenn du einen Fehler bekommst wie *„No such file or directory“*, prüfe:

```bash
ls ~/laravel-grundlagen-kurs
```

---

# 🟩 2. Laravel installieren

Laravel wird mit Composer installiert.

Befehl eingeben:

```bash
composer create-project laravel/laravel .
```

Wichtig:

- der Punkt `.` bedeutet „installiere in diesem Ordner“
- es dauert ca. 1–3 Minuten
- am Ende sollte KEIN Fehler rot erscheinen

---

# 🟨 3. Prüfen, ob Laravel richtig installiert wurde

```bash
php artisan --version
```

Wenn du eine Versionsnummer siehst, ist alles ok.

---

# 🟧 4. Laravel starten

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Du siehst dann so etwas wie:

```
INFO  Server running on [http://0.0.0.0:8000].
```

Das bedeutet: Laravel läuft!

---

# 🟫 5. Im Browser öffnen

Auf deinem **Host-PC**:

```
http://<VM-IP>:8000
```

Beispiele:

- `http://192.168.178.90:8000`
- `http://10.0.2.15:8000`

---

# 🟥 6. Häufige Fehler

**❌ „composer: command not found“**  
Composer fehlt → installieren:

```bash
sudo apt install composer -y
```

**❌ „php: command not found“**  
PHP fehlt oder ist falsch installiert.

**❌ Der Server startet nicht**  
Versuche:

```bash
php artisan optimize:clear
```

oder:

```bash
php -v
```

---

# ✔️ Geschafft!

Jetzt hast du Laravel korrekt installiert.  
Du kannst mit dem Kurs loslegen.  
Bei Problemen → Trainer fragen 😊
