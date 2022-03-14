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


    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }


    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }


    public function courseTeachers(): HasMany
    {
        return $this->hasMany(CourseTeacher::class);
        //, 'course_id', 'course_teacher_id'
    }
}
