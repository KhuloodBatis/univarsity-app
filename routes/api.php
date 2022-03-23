<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Student\SectionController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\Teacher\RegisterController as TeacherRegisterController;
use App\Http\Controllers\Admin\RegisterController as AdminRegisterController;


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

Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});


//this route to login for all model
Route::post('login', [LoginController::class, 'login']);

//group route teacher
Route::prefix('teachers')->group(function () {
    Route::post('register', [TeacherRegisterController::class, 'register']);
});

//group route Admin
Route::prefix('admins')->group(function () {
    Route::post('register', [AdminRegisterController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('courses', [CourseController::class, 'store']);
        Route::post('courses/{course}/teacher', [TeacherController::class, 'addTeacher']);
        Route::post('roles', [RoleController::class, 'store']);
    });
});

//group route student

Route::prefix('students')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    //here add auth because when student wante register to section he already do login then register in section by Auth token
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('sections/{courseTeacher}/register', [SectionController::class, 'section']);
    });
});
