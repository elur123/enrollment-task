<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Course;
use App\Models\Student;
class DashboardController extends Controller
{
    public function index()
    {

        return Inertia::render('Dashboard', [
            'courses_count' => Course::count(),
            'students_count' => Student::count()
        ]);
    }
}
