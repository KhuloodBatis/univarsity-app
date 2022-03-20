<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

    public function registerInSection(Request $request)
    {

        $user = User::where('id', $request->student_id)->first();
        $user->courseTeachers()->attach([
            $request->course_teacher_id
        ]);
        return $user;
    }
}
