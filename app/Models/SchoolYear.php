<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'fee'];

    public function subjects(){
        return $this->hasMany(Subject::class, 'school_year_id', 'id');
    }
}
