<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';

    protected $fillable=['name'];
    public function teacher(){

        return $this->belongsToMany(Teacher::class,'teacher_subject','subject_id','teacher_id');
    }
    public function student(){

        return $this->belongsToMany(Student::class,'marks','subject_id','student_id');
    }
    public function homework(){
        return $this->hasMany(Homework::class,'subject_id');

            }
}
