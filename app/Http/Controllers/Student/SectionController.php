<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{

    public function section(Request $request, CourseTeacher $courseTeacher)
    {

        // $user = User::where($request->user())->first();
        // $user->courseTeachers()->attach([
        //     $request->course_teacher_id
        // ]);

        //this code to register student after login by auth sanctum
        $courseTeacher->users()->attach([Auth::user()->id]);

        return response()->json([
            'status' => 'student was added in section',
        ]);
    }
}
