# LibraryManager – Aufgabenstellung Tag 1 (Laravel-Kurs)

Heute legst Du die Basis für das Projekt **LibraryManager**: Projektstruktur, Datenbank, erste Route und eine erste View.

---

## 1. Neues Laravel-Projekt erstellen

```bash
laravel new librarymanager
```

oder

```bash
composer create-project laravel/laravel librarymanager
```

---

## 2. Lokalen Server starten

```bash
php artisan serve
```

---

## 3. Datenbank vorbereiten

1. Neue Datenbank erstellen, z. B.:  
   **librarymanager**

2. In der `.env` eintragen:

```
DB_DATABASE=librarymanager
DB_USERNAME=dein_user
DB_PASSWORD=dein_passwort
```

3. Verbindung testen:

```bash
php artisan migrate
```

---

## 4. Controller & Route anlegen

Controller erstellen:

```bash
php artisan make:controller BookController
```

Route in `routes/web.php`:

```php
Route::get('/books', [BookController::class, 'index']);
```

---

## 5. Erste View erstellen

Datei:  
`resources/views/books.blade.php`

Inhalt: Begrüßungstext wie  
„LibraryManager – Startseite“.

---

## 6. Controller mit View verbinden

```php
public function index()
{
    return view('books');
}
```
