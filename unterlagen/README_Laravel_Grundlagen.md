# 📘 README – Laravel Grundlagen Kurs (Ubuntu-Server/VM Version)

## Willkommen zum Laravel-Grundlagenkurs (5 Tage)

Dieser Kurs besteht aus zwei getrennten Laravel-Projekten:

---

## 📁 Projektübersicht

### **1) campusmanager**
Ein vollständiges Beispielprojekt.
➡️ Wird vom Trainer verwendet, um alle Konzepte vorzuführen.

### **2) librarymanager**
Das Übungsprojekt für Dich als Teilnehmer.
➡️ Hier programmierst Du alle Aufgaben des Kurses selbst.

Beide Projekte liegen direkt im Kursordner, damit alles übersichtlich bleibt.

---

# 🖥 Arbeiten in der Ubuntu-Server-VM

Die gesamte Entwicklung findet in der **Ubuntu-Server-VM** statt.

Du verbindest Dich per:

```
ssh <dein-username>@<VM-IP-Adresse>
```

(Die IP-Adresse zeigt der Trainer oder die VM selbst beim Start an.)

---

# 📦 ZIP-Dateien entpacken (wichtig!)

Im Ordner **material/** findest Du:

```
tag1_complete.zip
tag2_complete.zip
tag3_complete.zip
tag4_complete.zip
tag5_complete.zip
```

Jede Datei enthält **alle Beispiele UND alle Übungen für den jeweiligen Tag**.

## 🔓 ZIP entpacken

In Ubuntu:

### Variante A – direkt im Kursordner entpacken

Wechsle zum Kursordner:

```bash
cd ~/laravel-grundlagen-kurs/material
```

ZIP entpacken (Beispiel: Tag 1):

```bash
unzip tag1_complete.zip -d tag1/
```

Danach findest Du alles unter:

```
material/tag1/
  examples/
  exercises/
```

### Variante B – wenn `unzip` noch nicht installiert ist

```bash
sudo apt install unzip -y
```

---

# 🌐 Laravel im Browser öffnen (VM → Host)

WICHTIG!
In der VM kannst Du **NICHT** `http://localhost:8000` im Windows-Browser öffnen.
Der Browser muss die **Adresse der VM** verwenden.

## Schritt 1 – Laravel starten

Im Projekt **librarymanager**:

```bash
cd ~/laravel/librarymanager
php artisan serve --host=0.0.0.0 --port=8000
```

Ausgabe:

```
Laravel development server started: http://0.0.0.0:8000
```

## Schritt 2 – Zum Browser des Host-PCs wechseln

Die Laravel-App erreichst Du unter:

```
http://<VM-IP>:8000
```

Beispiel:

```
http://192.168.178.90:8000

---

# 🚀 Wie Du im Kurs arbeitest

## 1) Übungen zu Tag X → ZIP von Tag X entpacken

**Wichtig:** Nur das Tag-X-Paket verwenden!
Nicht alles auf einmal entpacken.

## 2) Übungen im Projekt **librarymanager** lösen

Du arbeitest immer in:

```
~/laravel-grundlagen-kurs/librarymanager
```

Dort findest Du:

- routes/web.php
- app/Models/…
- app/Http/Controllers/…
- resources/views/…
- usw.

Alle Übungsdateien haben klare **TODO-Bereiche**.

## 3) Beispielcode im Projekt **campusmanager** anschauen

Du darfst jederzeit vergleichen:

```
~/laravel-grundlagen-kurs/campusmanager
```

Hier ist alles **fertig programmiert**.

---

# 🏷 Git-Stände (optional)

Wenn Du möchtest, kannst Du Deinen Fortschritt sichern:

```bash
git add .
git commit -m "Tag X abgeschlossen"
```

---

# 🧭 Struktur der beiden Projekte

```
laravel-grundlagen-kurs/
  campusmanager/    # Beispielprojekt (fertig)
  librarymanager/   # Übungen (mit TODOs)
  material/         # ZIP-Dateien tag1–tag5
  unterlagen/       # Kurs-Unterlagen
```

Alles flach, übersichtlich, ohne tiefe Strukturen.

---

# 🧩 Inhalt pro Tag

### **Tag 1 – Routing, Controller, Views**
(Statische Seiten, Layouts)

### **Tag 2 – Models, Migration, Seeder, Listen**

### **Tag 3 – CRUD**
(Create, Read, Update, Delete)

### **Tag 4 – Relationen**
(Buch ↔ Autor, Student ↔ Kurs)

### **Tag 5 – API**
(REST-Routen, JSON-Responses)

---

# ❓ Hilfe

Wenn etwas nicht funktioniert:

1. Beispiel im `campusmanager` ansehen
2. Deine Übungsdatei im `librarymanager` vergleichen
3. Trainer fragen

---

# Ende der README.md
