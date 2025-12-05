# Eager Loading sichtbar machen – Debugbar & Query Log

Diese Anleitung zeigt dir zwei praktische Methoden, um den Unterschied zwischen
**ohne** und **mit** Eager Loading in Laravel zu demonstrieren:

- mit der **Laravel Debugbar**
- mit **DB::enableQueryLog()**

Perfekt für den Einsatz im Unterricht.

---

## 🧰 Methode 1: Mit der Laravel Debugbar (visuell im Browser)

### 1. Debugbar installieren (falls noch nicht installiert)

```bash
composer require barryvdh/laravel-debugbar --dev
```

In aktuellen Laravel-Versionen wird die Debugbar automatisch registriert, wenn `APP_DEBUG=true` ist.

---

### 2. Beispiel ohne Eager Loading

Im Controller, z. B. in `StudentsController@index` oder in einer Test-Route:

```php
public function index()
{
    $students = Student::all();

    foreach ($students as $student) {
        // Zugriff auf Relation ohne Eager Loading
        $student->mainCourse?->name;
    }

    return view('students.index', compact('students'));
}
```

**Was passiert:**

- 1 Query für alle Studenten (`select * from students`)
- Für **jeden** Student eine zusätzliche Query für `mainCourse`
- → klassisches **N+1 Problem**

In der Debugbar im Browser-Tab **„Queries“** siehst du:
- viele einzelne `select * from courses where id = ?`-Abfragen

---

### 3. Beispiel mit Eager Loading

Jetzt den Code anpassen:

```php
public function index()
{
    $students = Student::with('mainCourse')->get();

    foreach ($students as $student) {
        $student->mainCourse?->name;
    }

    return view('students.index', compact('students'));
}
```

**Was passiert jetzt:**

- 1 Query für alle Studenten (`select * from students`)
- 1 Query für alle Kurse, die als Hauptkurs vorkommen (`select * from courses where id in (…)`)
- → nur noch **2 Queries**

In der Debugbar siehst du jetzt:
- genau diese 2 Abfragen statt vieler kleiner

---

## 🧰 Methode 2: Mit `DB::enableQueryLog()` (ohne Debugbar)

Diese Methode funktioniert auch auf Systemen ohne Debugbar, z. B. auf der VM.

### 1. Query Log einschalten

```php
use Illuminate\Support\Facades\DB;

DB::enableQueryLog();
```

---

### 2. Beispiel ohne Eager Loading

```php
DB::enableQueryLog();

$students = Student::all();

foreach ($students as $student) {
    $student->mainCourse?->name;
}

dd(DB::getQueryLog());
```

**Ergebnis:**

- Ausgabe eines Arrays mit allen Queries
- du siehst mehrfach ähnliche `select ... from "courses" where "id" = ?`-Abfragen

---

### 3. Query Log zurücksetzen

Vor dem nächsten Versuch:

```php
DB::flushQueryLog();
DB::enableQueryLog();
```

---

### 4. Beispiel mit Eager Loading

```php
DB::enableQueryLog();

$students = Student::with('mainCourse')->get();

foreach ($students as $student) {
    $student->mainCourse?->name;
}

dd(DB::getQueryLog());
```

**Ergebnis:**

- Log zeigt jetzt nur noch zwei relevante Queries  
  (Students + Kurse für die Relationen)

---

## 🎓 Didaktische Tipps

- Zeige zuerst den Fall **ohne** Eager Loading und lass die TN schätzen:
  - „Wie viele Queries werden ungefähr ausgeführt?“
- Dann Eager Loading ergänzen (`with('mainCourse')`) und erneut vergleichen.
- Nutze eine kleine Anzahl Datensätze (z. B. 10–20 Studenten), damit der Effekt gut sichtbar ist.
- Nutze Begriffe wie:
  - „Viele kleine Wege zur Datenbank“ vs. „ein großer Sammelweg“
  - „Wir holen alle Daten, die wir brauchen, gleich mit dazu.“

---

## 🧠 Merksatz für die TN

> **„Eager Loading holt verwandte Datensätze in einer extra Query gleich mit.  
> Ohne Eager Loading entstehen viele einzelne Nachfragen (N+1 Problem).“**
