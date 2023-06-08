<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Course;
class CourseStoreRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique(Course::class)],
            'average_gpa' => ['required', 'numeric', 'max:100'],
            'limit' => ['required', 'numeric'],
        ];
    }
}
