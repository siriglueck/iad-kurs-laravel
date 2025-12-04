<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StudentCreateRequest;

class StudentsController extends Controller
{
    public function index() 
    {
        // generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        // with('course') sorgt für "Eager Loading" bei verknüpften Abfragen
        // und umgeht so das N+1-Problem
        $students = Student::with(['mainCourse', 'courses'])->orderBy('lastname')->get();
        return view('students.index', compact('students'));
    }

    public function create() 
    {
        $courses = Course::orderBy('name')->get();

        return view('students.create', [
            'courses' => $courses,
        ]);
    }

    public function store( StudentCreateRequest $request ) 
    {
        $student = Student::create($request->validated());
        $students->course()->sync($request->input('course_ids', []));

        return redirect()
             ->route('students.index')
             ->with('success', 'Student wurde angelegt');
    }

    public function show(Student $student){
        $courses = Course::orderBy('name')->get();
        return view('students.show', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }
    public function edit(Student $student){
        $courses = Course::orderBy('name')->get();
        return view('students.edit', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }
    public function update(Request $request, Student $student){
        $data = $request->validate([
            'firstname' => ['required', 'string', 'max:100' ],
            'lastname'  => ['required', 'string', 'max:100' ],
            'email'     => ['required', 'email'],
            'age'       => ['nullable', 'integer', 'min:16', 'max:90'],
            'matriculation_number'  =>  [
                'required',
                'string',
                'max:20',
            ],
            'main_course_id' => ['nullable', 'integer', 'exists:courses,id'],
        ]);

        $student->update($data);
        // $student->update($request->except(['email', 'matriculation_number']));
        //$student = $request->safe()->only(['firstname','lastname','age']);
        return redirect()
             ->route('students.index')
             ->with('success', 'Student wurde erfolgreich geändert.');
    }
    public function destroy(Student $student){
        $student->delete();
        return redirect()
             ->route('students.index')
             ->with('success', 'Der Student wurde gelöscht');
    }
}
