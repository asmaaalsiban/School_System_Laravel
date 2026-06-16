<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', 'description', 'capacity'];
    public function Students()
    {
        return $this->hasMany(Student::class);
    }
    public function Teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
