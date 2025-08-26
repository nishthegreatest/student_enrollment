<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = [
        'title',
        'code',
        'description',
        'credits'
    ];

    /**
     * One-to-Many relationship:
     * A course can have many enrollments
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Many-to-Many relationship:
     * A course can have many students through enrollments table
     */
    public function students()
    {
        // Assuming 'enrollments' table has 'course_id' and 'student_id' columns
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id')
                    ->withTimestamps(); // optional: keeps created_at and updated_at in pivot
    }
}