<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=[
        'id',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function electives(){
        return $this->hasMany(Elective::class);
    }

    public function pays(){
        return $this->hasMany(Pay::class);
    }
}
