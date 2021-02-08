<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];
    // Admin::create(['name'=>'kero', 'email'=>'kero@gmail.com', 'password'=>Hash::make(123456789)])
}
