# Eager Loading – Spickzettel (Kurzfassung)

## 🔍 Problem: N+1  
Ohne Eager Loading:

```php
$students = Student::all();

foreach ($students as $student) {
    $student->mainCourse->name; // löst pro Student 1 Query aus
}
```

➡ Viele Queries → langsam.

---

## 🚀 Lösung: Eager Loading

```php
$students = Student::with('mainCourse')->get();
```

➡ Nur **2 Queries**:

1. alle Studenten  
2. alle benötigten Kurse

---

## 🧰 Debugbar-Methode

1. Debugbar öffnen → „Queries“  
2. Ohne Eager Loading testen → viele Queries  
3. Mit `with()` testen → 2 Queries  

---

## 🧰 QueryLog-Methode

```php
DB::enableQueryLog();
// Code ausführen
dd(DB::getQueryLog());
```

Ergebnis:
- ohne Eager Loading: viele ähnliche Queries  
- mit Eager Loading: genau 2 Queries

---

## 🧠 Merksatz

**„Eager Loading holt alles, was du brauchst, auf einmal — statt immer wieder nachzufragen.“**
