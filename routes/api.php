<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/student', function (Request $request) {
    return $request->user();
});

//route for student
Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/{student}', [StudentController::class, 'show']);
Route::put('students/{student}', [StudentController::class, 'update']);
Route::delete('students/{student}', [StudentController::class, 'destroy']);

//route for teacher
Route::get('teachers', [TeacherController::class, 'index']);
Route::post('teachers', [TeacherController::class, 'store']);
Route::get('teachers/{teacher}', [TeacherController::class, 'show']);
Route::put('teachers/{teacher}', [TeacherController::class, 'update']);
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy']);

//route for course
Route::get('courses', [CourseController::class, 'index']);
Route::post('courses', [CourseController::class, 'store']);
Route::get('courses/{course}', [CourseController::class, 'show']);
Route::put('courses/{course}', [CourseController::class, 'update']);
Route::delete('courses/{course}', [CourseController::class, 'destroy']);
//sections Rout
Route::post('sections/add-section', [SectionController::class, 'addSection']);
Route::post('sections/register-section', [SectionController::class, 'registerSection']);
//
Route::get('courses/show-course/{course}', [CourseController::class, 'showCourse']);
