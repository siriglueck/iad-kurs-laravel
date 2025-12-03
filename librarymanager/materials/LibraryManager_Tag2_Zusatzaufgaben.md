# LibraryManager – Aufgabenstellung Tag 2 Zusatzaufgaben (Laravel-Kurs)

---

## Übung Z1: Weitere Routen anlegen

**Datei**: `/routes/web.php`

Erstelle im Projekt *librarymanager* folgende Routen:

* `/welcome`
* `/team`
* `/contact`

Jede Route soll eine Methode des `SiteController` aufrufen:

* `welcome()`
* `team()`
* `contact()`

Jede Route soll zusätzlich einen Namen erhalten, z. B.:

* `library.welcome`
* `library.team`
* `library.contact`

---

## Übung Z2: Weiteren Controller anlegen

**Datei**: `/app/Http/Controllers/SiteController.php`

Erstelle den `SiteController` und fülle die drei Methoden:

* `welcome()`
* `team()`
* `contact()`

**Datei**: `/app/Http/Controllers/BookController.php`

Ändere den `BookController`:

* ändere die Methode `index()` und lade das View `books.index`

Jede Methode lädt eine eigene View im Ordner `/resources/views/site/` bzw `/resources/views/books/`.

---

## Übung Z3: Zusätzliches Layout erstellen

Wenn Du noch kein Master-Template erstellt hast, erstelle ein neues Master-Template.

Wenn Du bereits eins erstellt hast, passe bitte den Dateinamen an. Denke daran, dass Du dann auch die Routen und die Links in der Navigation und den Controllern anpassen musst. Prüfen dann auch, ob alle in dieser Übung angegebenen Teile enthalten sind. Wenn nicht, füge sie hinzu.

Binde eine CSS-Datei ein, welche Du unter `public/css/style.css` anlegst. Du kannst die CSS-Datei aus dem Campusmanager verwenden.

**Datei**: `resources/views/layouts/main.blade.php`

Das Layout muss enthalten:

* HTML5-Grundstruktur
* `<header>` mit Navigation (Links via `route()`)
* `<main>` mit `@yield('content')`
* `<footer>` mit Copyright

---

## Übung Z4: Weitere Statische Views

Erstelle drei weitere Views:

```bash
resources/views/site/welcome.blade.php  
resources/views/site/team.blade.php  
resources/views/site/contact.blade.php
```

Inhaltliche Anforderungen:

* **welcome**: Begrüßungstext
* **team**: Liste mit fiktiven Teammitgliedern
* **contact**: Adresse, Mail, Öffnungszeiten

Erstelle dazu die entsprechenden

---
