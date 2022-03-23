<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;



class CourseController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'alpha_num'],
            'hour' => ['required', 'integer', Rule::in([3, 4, 8])]
        ]);
        $course = Course::create([
            'name' => $request->name,
            'hour' => $request->hour
        ]);
        //this code to return cource as resource
        return new CourseResource($course);
    }
}
