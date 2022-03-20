<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\CourseTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hour',

    ];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_teacher', 'course_id', 'teacher_id', 'id', 'id');
    }

    public function courseTeachers(): HasMany
    {
        return $this->hasMany(CourseTeacher::class);
        //, 'course_id', 'course_teacher_id'
    }
}
