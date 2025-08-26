<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','email','phone','dob'];

    // Enrollment relationship (hasMany)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Courses through pivot table 'enrollments'
    public function courses()
    {
        return $this->belongsToMany(
            Course::class,   // Related model
            'enrollments',   // Pivot table
            'student_id',    // Foreign key on pivot table for this model
            'course_id'      // Foreign key on pivot table for the related model
        );
    }

    // Full name accessor
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}