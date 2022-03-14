<?php

namespace App\Models;

use App\Models\Student;

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


    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, null, null, 'student_id');
    }


    public function course(): BelongsTo
    {
        return $this->belongsTo(User::class);
        // 'course_teacher_id', 'course_id'
    }
}
