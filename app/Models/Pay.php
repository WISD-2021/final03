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

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function homeworks(){
        return $this->belongsTo(Homework::class);
    }
}
