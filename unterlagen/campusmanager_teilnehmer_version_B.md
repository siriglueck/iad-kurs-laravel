# Campusmanager – Teilnehmer-Version (Detailliertes Schulungsskript)

Dieses Dokument begleitet dich durch alle Schritte, die im Campusmanager nötig sind, um Relationen, Formulare, Controller und Datenbankstrukturen aufzubauen.

---

## 📘 1. Warum Relationen?

In einer Datenbank hängen Datensätze miteinander zusammen:

- Ein Student gehört zu einem **Hauptkurs** → 1:n
- Ein Student kann **mehrere Kurse belegen** → n:m
- Ein Kurs hat viele Studierende → n:m oder 1:n (im Fall des Hauptkurses)

Laravel macht diese Beziehungen mit drei Methoden sichtbar:

| Art der Relation | Beispiel | Methode |
|------------------|----------|---------|
| 1:n | Kurs → Studenten | `hasMany`, `belongsTo` |
| n:m | Student ↔ Kurs | `belongsToMany` |

---

## 📗 2. Migrations anlegen

### 2.1 Haupttabelle: `courses`

```php
Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('shortname');
    $table->unsignedTinyInteger('ects')->nullable();
    $table->timestamps();
});
```

➡ Aufgabe: Lege drei Kurse in die Tabelle ein (z. B. „Informatik“, „BWL“, „Mathe“).

---

### 2.2 Hauptkurs zu `students` hinzufügen

```php
Schema::table('students', function (Blueprint $table) {
    $table->foreignId('main_course_id')
        ->nullable()
        ->constrained('courses')
        ->nullOnDelete();
});
```

Der Hauptkurs ist optional (`nullable`), weil ein Student anfangs unbekannt sein kann.

---

### 2.3 Pivot-Tabelle für n:m

```php
Schema::create('course_student', function (Blueprint $table) {
    $table->id();
    $table->foreignId('course_id')->constrained()->cascadeOnDelete();
    $table->foreignId('student_id')->constrained()->cascadeOnDelete();
    $table->timestamps();
    $table->unique(['course_id', 'student_id']);
});
```

Diese Tabelle speichert, welcher Student welchen Kurs belegt.

---

## 📙 3. Models und ihre Relationen

### 3.1 Student

```php
public function mainCourse()
{
    return $this->belongsTo(Course::class, 'main_course_id');
}

public function courses()
{
    return $this->belongsToMany(Course::class)->withTimestamps();
}
```

### 3.2 Course

```php
public function mainStudents()
{
    return $this->hasMany(Student::class, 'main_course_id');
}

public function students()
{
    return $this->belongsToMany(Student::class)->withTimestamps();
}
```

➡ Aufgabe: Notiere kurze Beispiele, welche weiteren Relationen du in diesem Projekt abbilden könntest.

---

## 📒 4. Controller-Logik

### 4.1 Laden von Relationen (Eager Loading)

Verhindert viele unnötige Datenbankabfragen:

```php
$students = Student::with(['mainCourse', 'courses'])->get();
```

### 4.2 Speichern eines neuen Studenten

```php
$student = Student::create($validated);
$student->courses()->sync($request->course_ids ?? []);
```

### 4.3 Aktualisieren

```php
$student->update($validated);
$student->courses()->sync($request->course_ids ?? []);
```

---

## 📕 5. Formulare

### 5.1 Hauptkurs auswählen

```blade
<select name="main_course_id">
    <option value="">Bitte wählen</option>
    @foreach ($courses as $course)
        <option value="{{ $course->id }}">
            {{ $course->shortname }} – {{ $course->name }}
        </option>
    @endforeach
</select>
```

### 5.2 Belegte Kurse (Mehrfachauswahl)

```blade
<select name="course_ids[]" multiple>
    @foreach ($courses as $course)
        <option value="{{ $course->id }}">
            {{ $course->shortname }}
        </option>
    @endforeach
</select>
```

---

## 📙 6. Flash Messages

Damit Fehlermeldungen und Bestätigungen angezeigt werden:

In jeder View:

```blade
<x-flash />
```

---

## 📘 7. Ausgabe der Relationen

### 7.1 Hauptkurs

```blade
{{ $student->mainCourse?->shortname }}
```

### 7.2 Weitere belegte Kurse

```blade
{{ $student->courses->pluck('shortname')->join(', ') }}
```

---

## 📗 8. Resource Route

```php
Route::resource('students', StudentsController::class);
```

Damit stehen alle CRUD-Routen automatisch zur Verfügung.

---

## 🎓 Abschlussaufgabe

Erstelle in der Detail-Ansicht eines Studenten folgende Infos:

- Hauptkurs (Name + Shortname)
- Alle belegten Kurse
- Anzahl der Studenten, die denselben Hauptkurs belegen

Tipp:

```php
$student->mainCourse->students->count();
```

---

Viel Erfolg!
