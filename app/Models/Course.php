<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Course extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'label',
        'average_gpa',
        'limit'
    ];

    /**
     * 
     * Scopes funtions
     */

    public function scopeWhereLimit(Builder $query)
    {
        $query->where('limit', '>', function ($subquery) {
            $subquery->selectRaw('COUNT(*)')
                ->from('students')
                ->whereColumn('course_id', 'courses.id');
        });
    }

    /**
     * 
     * Relationship functions
     */

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }
}
