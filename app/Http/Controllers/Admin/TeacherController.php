<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class TeacherController extends Controller
{
    public function addTeacher(Request $request, Course $course)
    {   //this code to add teacher to  course by Admin user Id course
        $this->validate($request, [
            'teacher_id' => ['required', 'exists:users,id']
        ]);
        $course->users()->attach($request->teacher_id);


        return response()->json([
            'status' => 'teacher was added successfully'
        ]);
    }
}
