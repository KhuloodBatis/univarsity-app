<?php

namespace App\Models;

use App\Models\Course;
use App\Models\CourseTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }



    public function courseTeachers(): HasMany
    {
        return $this->hasMany(CourseTeacher::class);
        //, 'course_id', 'course_teacher_id'
    }
}
