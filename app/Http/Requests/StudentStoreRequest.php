<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Student;
class StudentStoreRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(Student::class)],
            'mobile_number' => ['required', 'string', 'max:12'],
            'address' => ['required', 'string', 'max:1040'],
            'gpa' => ['required', 'numeric', 'max:100'],
            'course' => ['required'],
        ];
    }
}
