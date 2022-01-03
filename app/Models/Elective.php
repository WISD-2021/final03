<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\AbstractList;

class Elective extends Model
{
    use HasFactory;
    protected $table='electives';
    protected $fillable=[
        'id',
        'student_id',
        'course_id',
        'score',
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function courses(){
        return $this->belongsTo(Course::class);
    }
}
