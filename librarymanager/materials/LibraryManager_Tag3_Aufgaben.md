# LibraryManager – Aufgabenstellung Tag 3 (Laravel-Kurs)

Heute fügst Du Formularverarbeitung hinzu: Bücher sollen über ein HTML-Formular erstellt werden können.

---

## Übung 10: Resource-Controller anlegen (wenn bereits vorhanden: ändern)

**Datei**: `app/Http/Controllers/BookController.php`

Methoden implementieren:

* `index()`
* `create()`
* `store()`
* `show(Book $book)`
* `edit(Book $book)`
* `update()`
* `destroy()`

---

## Übung 11: Resource-Route registrieren

**Datei**: `routes/web.php`

```php
Route::resource('books', BookController::class);
```

---

## Übung 12: Formular „Buch anlegen“

**Datei**: `resources/views/books/create.blade.php`

Felder:

* `title`
* `author`
* `isbn`
* `published_year`
* `category`

Mit:

* `@csrf`
* `old()` als Vorbelegung

---

## Übung 13: Formular „Buch bearbeiten“

**Datei**: `resources/views/books/edit.blade.php`

Erforderlich:

* `@csrf`
* `@method('PUT')`
* Vorbelegung mit `old('feld', $book->feld)`

---

## Übung 14: Buchdetails anzeigen

**Datei**: `resources/views/books/show.blade.php`

Anzeigen:

* Alle Eigenschaften
* Links:
  * Zurück zur Liste
  * Bearbeiten

---

## Übung 15: Validierung auslagern

**Datei**: `app/Http/Requests/StoreBookRequest.php`

Regeln:

```bash
title: required, string, min:3
author: required, string, min:3
isbn: required, string, size:13, unique:books,isbn
published_year: nullable, integer, between:1900,<aktuelles Jahr>
category: nullable, string
```

Damit können Bücher jetzt per Formular in die Datenbank geschrieben werden.
