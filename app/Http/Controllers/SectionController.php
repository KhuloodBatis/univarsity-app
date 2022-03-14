<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;

class SectionController extends Controller
{
    public function addSection(Request $request)
    {
        $teacher = Teacher::where('id', $request->teacher_id)->first();
        $teacher->courses()->attach([
            $request->course_id
        ]);
        // $course->teachers()->attach([
        //     $request->teacher_id
        // ]);

        return $teacher;
    }
    public function registerSection(Request $request)
    {
        $student = Student::where('id', $request->student_id)->first();


        $student->courseTeachers()->attach([
            $request->course_teacher_id
        ]);
        return $student->load('courseTeachers');
    }
}
