<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'relation', 'student_id'];

    public function child(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
