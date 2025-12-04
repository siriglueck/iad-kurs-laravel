<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest 
{
    public function authorize():bool
    {
        return true;
    }

    public function rules(): array 
    {
        return [
            'firstname' => ['required', 'string', 'max:100'],
            'lastname'  => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email', 'unique:students,email'],
            'age'       => ['nullable', 'integer', 'min:16', 'max:90'],
            'matriculation_number'  =>  [
                'required',
                'string',
                'max:20',
                'unique:students,matriculation_number'
            ],
            'main_course_id' => ['nullable', 'integer', 'exists:courses,id'],
        ];
    }
}