# Campusmanager – Resource Routes & Anpassungen (Trainer-Vorlage)

Dieses Dokument erklärt die Nutzung von `Route::resource()` im Campusmanager-Projekt und zeigt, welche Änderungen im Controller, in den Views und in den Formularen nötig werden.

---

## 1. Resource-Route in `routes/web.php`

Statt alle Routen einzeln zu definieren:

```php
use App\Http\Controllers\StudentsController;

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
```

verwendest du nun:

```php
Route::resource('students', StudentsController::class);
```

Dies erzeugt **automatisch alle Standard-REST-Routen**.


---

## 2. Übersicht der erzeugten Routen

| Methode | URL                        | Controller-Methode | Routenname           |
|--------|-----------------------------|--------------------|----------------------|
| GET    | /students                  | index              | students.index       |
| GET    | /students/create           | create             | students.create      |
| POST   | /students                  | store              | students.store       |
| GET    | /students/{student}        | show               | students.show        |
| GET    | /students/{student}/edit   | edit               | students.edit        |
| PUT    | /students/{student}        | update             | students.update      |
| DELETE | /students/{student}        | destroy            | students.destroy     |

Alle Namen bleiben identisch zu den vorherigen manuellen Routen.

- Mit `php artisan route:list` zeigt man, welche Routen automatisch entstehen.
- Vorteil: Weniger Code, klarere Struktur, weniger Fehlerquellen.
- Gut kombinierbar mit den vorherigen Themen: Formulare, Eager Loading, Relationen.

---

## 3. Controller-Signaturen (Route Model Binding)

Der `StudentsController` sollte so aussehen:

```php
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(Student $student) {}

    public function edit(Student $student) {}

    public function update(Request $request, Student $student) {}

    public function destroy(Student $student) {}
}
```

> Hinweis:  
> Dank **Route Model Binding** lädt Laravel beim Zugriff auf `/students/{student}` automatisch das passende `Student`‑Model.

---

## 4. Views anpassen

Wenn in den Templates bereits die Route-Namen genutzt werden, muss nichts geändert werden:

```blade
<a href="{{ route('students.index') }}">Liste</a>
<a href="{{ route('students.create') }}">Neu</a>
<a href="{{ route('students.show', $student) }}">Details</a>
<a href="{{ route('students.edit', $student) }}">Bearbeiten</a>
```

Falls harte URLs benutzt wurden (`/students/1/edit`), sollten sie ersetzt werden durch:

```blade
<a href="{{ route('students.edit', $student) }}">Bearbeiten</a>
```

---

## 5. Formulare

### Create-Formular

```blade
<form action="{{ route('students.store') }}" method="post">
    @csrf
    {{-- Felder … --}}
</form>
```

### Edit-Formular

```blade
<form action="{{ route('students.update', $student) }}" method="post">
    @csrf
    @method('PUT')
    {{-- Felder … --}}
</form>
```

### Delete-Formular

```blade
<form action="{{ route('students.destroy', $student) }}" method="post" onsubmit="return confirm('Wirklich löschen?');">
    @csrf
    @method('DELETE')
    <button type="submit">Löschen</button>
</form>
```

---

## 6. Einschränkung der Resource-Routen

Laravel erlaubt das Beschränken der Resource-Route:

### 6.1 Nur bestimmte Routen erlauben `->only(['index', 'show'])`

```php
Route::resource('students', StudentsController::class)->only(['index', 'show']);
```

Dies erzeugt **nur**:

- `students.index`
- `students.show`

| Methode | URL                 | Action | Name           |
| ------- | ------------------- | ------ | -------------- |
| GET     | /students           | index  | students.index |
| GET     | /students/{student} | show   | students.show  |

Alle anderen (`create`, `store`, `edit`, `update`, `destroy`) werden **nicht** registriert.

**Typischer Use Case:**
Ein Bereich soll nur angezeigt, aber nicht bearbeitet werden → z. B. öffentliche Listen.

---

### 6.2 Bestimmte Routen ausschließen `->except(['destroy'])`

```php
Route::resource('students', StudentsController::class)->except(['destroy']);
```

Dies erzeugt **alle** Resource-Routen EXKLUSIVE der `destroy`‑Route.

| Methode   | URL                      | Action                |
| --------- | ------------------------ | --------------------- |
| GET       | /students                | index                 |
| GET       | /students/create         | create                |
| POST      | /students                | store                 |
| GET       | /students/{student}      | show                  |
| GET       | /students/{student}/edit | edit                  |
| PUT/PATCH | /students/{student}      | update                |
| ❌ DELETE  | /students/{student}      | **destroy fällt weg** |

**Typischer Use Case:**
Delete ist nicht erlaubt oder soll später dazukommen.

---
