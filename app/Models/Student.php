<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = ['name','phone','address','class_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
