<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    protected $table='pays';
    protected $fillable=[
        'id',
        'student_id',
        'homework_id',
        'datetime',
        'file',
        'score',
    ];
}
