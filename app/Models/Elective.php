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
}
