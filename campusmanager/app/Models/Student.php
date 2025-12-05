<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstname',
        'lastname',
        'email',
        'age',
        'matriculation_number',
        'main_course_id'
    ];

    /**
     * Falls der zugehörige Tabellen-Name der Datenbank nicht den Laravel-Konventionen genügt, kann hier der abweichende Tabellen-Name genutzt werden.
     * 
     * (
     * Laravel-Konvention:
     * DB-Tabellenname: Kleinschreibung im Plural z.B. students
     * Model-Klassen-Bezeichner: Großschreibung, Singular, z.B. Student
     * )
     * 
     */
    // protected $table = 'anderer_tabellenname';

    public function mainCourse() {
        // Ein Student gehört zu einem Kurs
        return $this->belongsTo(Course::class, 'main_course_id');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_student')
               ->withTimestamps();
    }
}
