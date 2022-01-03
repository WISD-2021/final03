<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
    protected $fillable=[
        'id',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->hasOne(Course::class);
    }
}
