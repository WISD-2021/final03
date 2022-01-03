<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable=[
        'id',
        'student_id',
        'name',
        'credits',
    ];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }

    public function electives(){
        return $this->hasMany(Elective::class);
    }
}
