<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'class_token'];

    public function students(){
        return $this->hasMany(Student::class, 'class_room_id', 'id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'class_teachers', 'class_id', 'teacher_id');
    }
}
