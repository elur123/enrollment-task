<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Student;
use App\Models\Course;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::query()
        ->with('course')
        ->get();

        return Inertia::render('Students/Index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Students/Create', [
            'courses' => Course::query()
            ->whereLimit()
            ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request)
    {
        $course = Course::find($request->course);

        if ($request->gpa < $course->average_gpa) 
        {
            return Redirect::back()->withErrors([
                'message' => 'Student average GPA not meet the course GPA ( ' . $course->average_gpa . ' )'
            ]);
        }

        Student::create([
            'student_id' => 'STD-'. Student::count(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'gpa' => $request->gpa,
            'course_id' => $request->course,
            'has_scholarship' => $request->gpa > $course->average_gpa
        ]);


        return Redirect::route('students.index')
        ->with('success', 'Successfully enrolled student.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return Inertia::render('Students/Edit', [
            'courses' => Course::query()
            ->whereLimit()
            ->get(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $course = Course::find($request->course);

        if ($request->gpa < $course->average_gpa) 
        {
            return Redirect::back()->withErrors([
                'message' => 'Student average GPA not meet the course GPA ( ' . $course->average_gpa . ' )'
            ]);
        }

        $student->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'gpa' => $request->gpa,
            'course_id' => $request->course,
            'has_scholarship' => $request->gpa > $course->average_gpa
        ]);


        return Redirect::route('students.index')
        ->with('success', 'Successfully updated student.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
