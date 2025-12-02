# LibraryManager – Aufgabenstellung Tag 2 (Laravel-Kurs)

Heute arbeitest Du an den ersten echten Datenstrukturen: Migration, Model und erste Datenbankabfragen.

---

## Übung 5: Book Model

**Datei**: `app/Models/Book.php`

Model mit `$fillable`:

* `title`
* `author`
* `isbn`
* `published_year`
* `category`

---

## Übung 6: Migration für Books

**Datei**: `database/migrations/...create_books_table.php`

Spalten:

* `title` (string)
* `author` (string)
* `isbn` (string, unique)
* `published_year` (unsigned integer, nullable)
* `category` (string, nullable)

Mit Tinker ein paar Bücher anlegen:

```bash
php artisan tinker
```

Beispiel:

```php
Book::create([
  'title' => 'Der Hobbit',
  'author' => 'J.R.R. Tolkien',
  'year' => 1937
]);
```

Mindestens drei Bücher anlegen.

---

## Übung 7: Seeder für Book

**Datei**: `database/seeders/BookSeeder.php`

Anforderungen:

* min. 5 feste Bücher mit realistischem Inhalt
* optional: zusätzliche Faker-Daten

---

## Übung 8: Route & Controller für Bücherliste

Route in `web.php` mit:

```bash
/books
```

Controller:

**Datei**: `app/Http/Controllers/BookListController.php`

Aufgabe:

* Alle Bücher laden, sinnvoll sortieren
* An View übergeben

---

## Übung 9: Bücherliste anzeigen

**Datei**: `resources/views/books/index.blade.php`

Darstellung:

* Tabelle mit Spalten
  * Titel
  * Autor
  * ISBN
  * Erscheinungsjahr
  * Kategorie
* Hinweis, falls keine Bücher existieren

---
