<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'phone', 'payed', 'class_room_id', 'school_year_id'];

    public function class_room(){
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');
    }

    public function school_year(){
        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');
    }

    public function parents(){
        return $this->hasMany(StudentParent::class, 'student_id', 'id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'student_subjects', 'student_id', 'subject_id');
    }
}
