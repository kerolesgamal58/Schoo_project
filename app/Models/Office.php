<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function teachers(){
        return $this->hasMany(Teacher::class, 'office_id', 'id');
    }

    public function workers(){
        return $this->hasMany(Worker::class, 'office_id', 'id');
    }
}
