<?php

namespace App\Models;

use App\Models\CourseTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;

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


    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    
}
