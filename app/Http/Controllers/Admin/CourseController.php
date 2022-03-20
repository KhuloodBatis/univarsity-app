<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function addCourse(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'hour' => 'required'
        ]);
        $course = Course::create([
            'name' => $request->name,
            'hour' => $request->hour
        ]);
        return $course;
    }
}
