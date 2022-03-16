<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    // to erturn all courses
    public function index()
    {
        $courses = Course::with('teachers.courseTeachers.students')->get();
        $data = $courses->map(function ($course) {
            return [
                "id" => $course->id,
                "name" => $course->name,
                "hour" => $course->hour,
                'teachers' => $course->teachers->map(function ($teacher) {
                    return [
                        'id' => $teacher->id,
                        'name' => $teacher->name,
                        'students' => $teacher->courseTeachers->flatMap(function ($courseTeacher) {
                            return $courseTeacher->students->map(function ($students) {
                                return [
                                    'id' => $students->id,
                                    'name' => $students->name,
                                ];
                            });
                        })

                    ];
                }),
               


            ];
        });
        return $data;
    }



    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hour' => 'required',
            //'teacher_id' => 'required',
            //'student_id' => 'required',

        ]);
        $course = Course::create([
            'name' => $request->name,
            'hour' => $request->hour,
            //'teacher_id' => $request->teacher_id,
            //'student_id' => $request->student_id
        ]);
        $course->teachers()->attach($request->teacher);
        $course->students()->attach($request->student);
        return $course;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    { //, 'students'

        return $course->load('teachers');
    }

    public function showCourse(Course $course)
    {
        $course->load('teachers', 'courseTeachers.students');


        return  $course;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'hour' => 'required'
        ]);

        $course->update([
            'name' => $request->name,
            'hour' => $request->hour,
        ]);
        $course->teachers()->sync($request->teachers);
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    }
}
