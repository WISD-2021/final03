<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $table='homework';
    protected $fillable=[
        'id',
        'student_id',
    ];

    public function courses(){
        return $this->belongsTo(Course::class);
    }

    public function pays(){
        return $this->hasMany(Pay::class);
    }
}
