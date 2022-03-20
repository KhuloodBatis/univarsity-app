<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function addTeacherToCourse(Request $request)
    {

        $course = Course::where('id', $request->course_id)->first();
        $course->users()->attach(
            $request->teacher_id
        );
        return $course;
    }
}
