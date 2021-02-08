<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    use HasFactory;
    protected $fillable = ['class_id', 'teacher_id'];

    public function class_room(){
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }
}
