<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'shortname',
        'ects',
    ];

    public function students() {
        // Ein Kurs hat viele Studenten (1:n)
        // Ist in diesem Projekt nicht realistisch
        // return $this->hasManay(Student::class, 'students_id');

        // Viele Studierende können viele Kurse belegen (m:n)
        return $this->belongsToMany(Student::class, 'course_student')
               ->withTimestamps();
    }

}
