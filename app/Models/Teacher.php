<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'phone', 'office_id', 'subject_id'];

    public function classes(){
        return $this->belongsToMany(ClassRoom::class, 'class_teachers', 'teacher_id', 'class_id');
    }

    public function office(){
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
