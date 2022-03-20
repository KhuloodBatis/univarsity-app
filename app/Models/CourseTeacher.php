<?php

namespace App\Models;

use App\Models\User;



use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CourseTeacher extends Pivot
{
    use HasFactory;
    protected $table = 'course_teacher';
    protected $fillable = [
        'teacher_id',
        'course_id',
    ];

    public $incrementing = true;


    protected $foreignKey = 'course_teacher_id';


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_teacher_student', 'course_teacher_id', 'student_id', 'id', 'id');
    }


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
        // 'course_teacher_id', 'course_id'
    }
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'course_teacher_student', 'course_teacher_id', 'teacher_id', 'id', 'id');
    //     // 'course_teacher_id', 'course_id'
    // }
}
