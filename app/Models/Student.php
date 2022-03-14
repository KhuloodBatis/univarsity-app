<?php

namespace App\Models;

use App\Models\CourseTeacher;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function courseTeachers(): BelongsToMany
    {
        return $this->belongsToMany(
            CourseTeacher::class,
            'course_techer_student',
            'student_id',
            'course_teacher_id',
            'id',
            'id'
        );
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
        //, null, null, 'course_id'
    }
}
