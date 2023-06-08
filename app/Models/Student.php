<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Student extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'student_id',
        'fullname',
        'email',
        'mobile_number',
        'address',
        'gpa',
        'course_id',
        'has_scholarship',
    ];

    /**
     * 
     * Relationship functions
     */

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
