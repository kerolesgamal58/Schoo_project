<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'school_year_id'];

    public function teachers(){
        return $this->hasMany(Teacher::class, 'subject_id', 'id');
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_subjects', 'subject_id', 'student_id');
    }

    public function school_year(){
        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');
    }
}
